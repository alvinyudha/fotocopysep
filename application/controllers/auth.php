<?php
defined('BASEPATH') or exit('No direct script access allowed');
class auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }
        //RULES
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus diisi',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi'
        ]);

        if ($this->form_validation->run() == false) { //jika gagal maka
            $data['tittle'] = 'Login Page';
            $this->load->view('auth/login', $data);
        } else { //jika berhasil maka
            //validasi success
            $this->_login();
        }
    }

    //Fungsi Login
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //query ke database
        $tb_user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
        //jika usernya ada
        if ($tb_user) {
            //jika usernya aktif
            if ($tb_user['is_actived'] == 1) {
                //cek password
                if (password_verify($password, $tb_user['password'])) {  // menyamakan antara password yang sudah diketik dilogin form dengan pass yg sudah dihash(enkripsi)
                    $data = [
                        'email' => $tb_user['email'],
                        'id_user' => $tb_user['id_user'],
                        'role_id' => $tb_user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    //jika role id = 1 maka masuk ke admin
                    if ($tb_user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('website');
                    }
                } else { //jika gagal maka 
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('auth');
                }
            } else { //jika user tidak aktif maka

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email ini belum melakukan aktivasi!</div>');
                redirect('auth');
            }
        } else { //jika tidak ada user
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email ini belum terdaftar!</div>');
            redirect('auth');
        }
    }


    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }
        $data['tittle'] = 'Registration';
        //RULES
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Masukkan nama'
        ]); // trim berfungsi supaya saat menyisakan spasi didepan/dibelakang tulisan tidak masuk ke database
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'Email ini sudah terdaftar',
            'required' => 'Masukkan alamat email',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Masukkan kata sandi',
            'matches' => 'Kedua kata sandi tidak sama',
            'min_length' => 'Kata sandi terlalu pendek'
        ]); // matches berfungsi supaya dua password sama
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',); // min_length tak perlu ditulis lagi karna sudah mengikuti yang ke satu

        if ($this->form_validation->run() == false) { //kalo form validasinya gagal maka akan menampilkan kembali form regis yg dibawah
            $this->load->view('auth/registration', $data);
        } else { //kalo berhasil maka data masuk ke database
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                // 'password' => $this->input->post('password1'),
                'role_id' => 2,
                'is_actived' => 0,
                'date_created' => time()
            ];

            //siapkan token
            $token = base64_encode(random_bytes(32));

            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('tb_user', $data);
            $this->db->insert('tb_user_token', $user_token);
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda berhasil dibuat. Silahkan cek email anda untuk melakukan aktivasi</div>');
            redirect('auth');
        }
    }

    public function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'alvinyudha73@gmail.com',
            'smtp_pass' => 'xleaabzpyaqsujwg', //menggunakan sandi aplikasi dengan verifikasi 2 langkah
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('alvinyudha73@gmail.com', 'Alvin Yudha');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link ini untuk verifikasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Here</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk reset password anda : <a href="' . base_url() . 'auth/resetpass?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        // $this->load->library('email', $config);
        // $this->email->initialize($config);
        // $this->email->from('alvinyudha73@gmail.com', 'Alvin Yudha');
        // $this->email->to('Chilijueyun@gmail.com');
        // $this->email->subject('Testing');
        // $this->email->message('Hai mbak mbak hentai');
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_actived', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tb_user');

                    $this->db->delete('tb_user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Telah melakukan aktivasi. Silahkan login</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('tb_user', ['email' => $email]);
                    $this->db->delete('tb_user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Kedaluarsa</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Invalid!!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Gagal!! Email Anda Tidak Benar.</div>');
            redirect('auth');
        }
    }

    public function resetPass()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->db->delete('tb_user_token', ['email' => $email]);
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Invalidl!!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal!!</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]', [
            'required' => 'Masukkan Kata Sandi',
            'min_length' => 'Password Terlalu Pendek',
            'matches' => 'Kata Sandi Tidak Sama'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|matches[password1]', [
            'required' => 'Ulangi Kembali Kata Sandi',
            'matches' => 'Kata Sandi Tidak Sama'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['tittle'] = 'Lupa Kata Sandi';
            $this->load->view('auth/change-password', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Telah Diubah! Silahkan Kembali Login</div>');
            redirect('auth');
        }
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', [
            'required' => 'Masukkan Alamat Email',
            'valid_email' => 'Email Tidak Valid'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['tittle'] = 'Lupa Kata Sandi';
            $this->load->view('auth/forgot-password', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('tb_user', ['email' => $email, 'is_actived' => 1])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('tb_user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mohon cek email anda untuk melakukan reset password</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar atau belum aktivasi!!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        session_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Logout!</div>');
        redirect('auth');
    }
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Akun Saya',
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'kategori' => $this->db->get('tb_kategori')->result_array(),
            'user' => $this->db->get('tb_user')->result_array()
        ];
        $this->form_validation->set_rules(
            'name',
            'Nama',
            'trim|required',
            ['required' => 'Masukkan Nama']
        );
        $this->form_validation->set_rules(
            'ttl',
            'ttl',
            'trim|required',
            ['required' => 'Masukkan Tanggal Lahir']
        );
        $this->form_validation->set_rules(
            'kelamin',
            'kelamin',
            'trim|required',
            ['required' => 'Masukkan Jenis Kelamin']
        );
        $this->form_validation->set_rules(
            'telepon',
            'telepon',
            'trim|required',
            ['required' => 'Masukkan Nomor HP']
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header-web', $data);
            $this->load->view('web-toko/akun', $data);
            $this->load->view('template/footer-web');
        } else {
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $ttl = $this->input->post('ttl');
            $kelamin = $this->input->post('kelamin');
            $telepon = $this->input->post('telepon');
            $upload_image = $_FILES['image'];
            if ($upload_image) {
                $config['upload_path']          = './assets/img/profile/';
                $config['allowed_types']        = 'gif|jpg|PNG|png|jpeg';
                $config['max_size']             = 10000;
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array(
                'name' => $name,
                'ttl' => $ttl,
                'kelamin' => $kelamin,
                'telepon' => $telepon,
            );

            $this->db->where('email', $email);
            $this->db->update('tb_user', $data);
            $this->session->set_flashdata('pesan', 'Profile anda berhasil diubah!');
            redirect('pelanggan');
        }
    }
    public function edit()
    {
        $id_user = $this->input->post('id_user');
        $name = $this->input->post('name');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');
        $data = array(
            'name' => $name,
            'telepon' => $telepon,
            'alamat' => $alamat,
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user', $data);
        $this->session->set_flashdata('pesan', 'Alamat anda berhasil di update!');
        redirect('pelanggan');
    }
    public function ubahpassword()
    {
        $data['tittle'] = 'Ubah Kata Sandi';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 

        //rules
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim', [
            'required' => 'Tidak dapat dikosongkan'
        ]);
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]', [
            'min_lenght' => 'Password terlalu pendek',
            'required' => 'Masukkan kata sandi baru',
            'min_length' => 'Password terlalu pendek',

        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|min_length[3]|matches[new_password1]', [
            'required' => 'Ulangi kembali kata sandi',
            'min_length' => 'Kata sandi terlalu pendek',
            'matches' => 'Kedua kata sandi tidak sama'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header-web', $data);
            $this->load->view('web-toko/ubahpassword', $data);
            $this->load->view('template/footer-web');;
        } else {
            $current_password = $this->input->post('current_password');
            $new_pasword = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['tb_user']['password'])) { //jika salah masukin password sama maka
                $this->session->set_flashdata('ubah', '<div class="alert alert-danger" role="alert">Password lama tidak benar!</div>');
                redirect('pelanggan/ubahpassword');
            } else { //jika passwordnya benar maka
                if ($current_password == $new_pasword) { //mengecek password jika password baru sama dengan password lama
                    $this->session->set_flashdata('ubah', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password sebelumnya!</div>');
                    redirect('pelanggan/ubahpassword');
                } else { //jika passwordnya beda maka
                    $password_hash = password_hash($new_pasword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tb_user');

                    $this->session->set_flashdata('ubah', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('pelanggan');
                }
            }
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['tittle'] = 'My Profile';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('template/footer');
    }
    public function changepassword()
    {
        $data['tittle'] = 'Ubah Password';
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
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('profile/changepassword', $data);
            $this->load->view('template/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_pasword = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['tb_user']['password'])) { //jika salah masukin password sama maka
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('profile/changepassword');
            } else { //jika passwordnya benar maka
                if ($current_password == $new_pasword) { //mengecek password jika password baru sama dengan password lama
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password sebelumnya!</div>');
                    redirect('profile/changepassword');
                } else { //jika passwordnya beda maka
                    $password_hash = password_hash($new_pasword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tb_user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('profile/changepassword');
                }
            }
        }
    }
    public function edit()
    {
        $data['tittle'] = 'Edit Profile';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 

        $this->form_validation->set_rules(
            'name',
            'Full Name',
            'trim|required',
            ['required' => 'Masukkan Nama']
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('profile/edit', $data);
            $this->load->view('template/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek image
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path']          = './assets/img/profile/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = '2048';

                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('tb_user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile anda berhasil diubah!</div>');
            redirect('profile');
        }
    }
}

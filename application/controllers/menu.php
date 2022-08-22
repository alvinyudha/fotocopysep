<?php
defined('BASEPATH') or exit('No direct script access allowed');
class menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_model', 'menu');
    }

    public function index()
    {
        $data['tittle'] = 'Menu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();
        //RULES
        $this->form_validation->set_rules('menu', 'Menu', 'required', [
            'required' => 'Gagal menambahkan role'
        ]);
        if ($this->form_validation->run() == false) { //jika gagal maka
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else { //jika berhasil maka
            $data = ['menu' => $this->input->post('menu')];
            $this->db->insert('tb_user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu telah ditambahkan!</div>');
            redirect('menu');
        }
    }
    public function edit_menu($id)
    {
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');
        $data = array(
            'menu' => $menu,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_user_menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu telah diubah!</div>');
        redirect('menu');
    }
    public function hapus_menu($id)
    {
        $this->menu->hapus_menu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu telah dihapus!</div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['tittle'] = 'Submenu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->menu->getSubmenu();
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->form_validation->set_rules('tittle', 'Tittle', 'required', []);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required', []);
        $this->form_validation->set_rules('url', 'Url', 'required', []);
        $this->form_validation->set_rules('icon', 'Icon', 'required', []);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'tittle' => $this->input->post('tittle'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('tb_user_submenu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu telah ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }
    public function hapus_submenu($id)
    {
        $this->menu->hapus_submenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Submenu telah dihapus!</div>');
        redirect('menu/submenu');
    }
}

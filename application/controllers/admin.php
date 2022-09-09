<?php
defined('BASEPATH') or exit('No direct script access allowed');
class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_model', 'admin');
        $this->load->model('m_pesanan_masuk');
    }
    public function index()
    {
        $data = array(
            'tittle' => 'Dashboard'

        );
        $data['total_pesanan_masuk'] = $this->m_pesanan_masuk->total_pesanan_masuk();
        $data['total_barang'] = $this->admin->total_barang();
        $data['total_kategori'] = $this->admin->total_kategori();
        $data['tb_user']    = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('template/footer');
    }
    public function role()
    {
        $data['tittle'] = 'Role';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        $data['role'] = $this->db->get('tb_user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Gagal menambahkan role'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('tb_user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role baru telah ditambahkan!</div>');
            redirect('admin/role');
        }
    }
    public function hapus_role($id)
    {
        $this->admin->hapus_role($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Role telah dihapus!</div>');
        redirect('admin/role');
    }
    public function roleaccess($role_id)
    {
        $data['tittle'] = 'Role Access';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 

        $data['role'] = $this->db->get_where('tb_user_role', ['id' => $role_id])->row_array();
        $this->db->where('id!=', 1);
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('template/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        //menyiapkan data buat masuk ke query
        $data = [
            'role_id' => $role_id, //untuk mengecek ada tidaknya role_id dan menu_id di tb access menu
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('tb_user_accessmenu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('tb_user_accessmenu', $data);
        } else {
            $this->db->delete('tb_user_accessmenu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access telah berubah!</div>');
    }
}

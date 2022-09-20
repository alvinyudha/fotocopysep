<?php
defined('BASEPATH') or exit('No direct script access allowed');
class laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_pesanan_masuk');
    }


    public function index()
    {
        $data['tittle'] = 'Laporan';
        $data['pesanan_diproses'] = $this->m_pesanan_masuk->pesanan_diproses();
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        //RULES

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('template/footer');
    }
}

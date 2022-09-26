<?php
defined('BASEPATH') or exit('No direct script access allowed');
class transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_pesanan_masuk');
    }

    public function index()
    {
        $data['tittle'] = 'Transaksi Pembeli';
        
        $data['detail_beli'] = $this->m_pesanan_masuk->transaksi_pesanan();
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('template/footer');
    }
}

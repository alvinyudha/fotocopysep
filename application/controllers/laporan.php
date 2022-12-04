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

    public function laporan_bulanan()
    {
        $bulan = $this->input->post('bulan');

        $data['tittle'] = 'Laporan';
        if ($bulan == null) {
            $bulan = 'MONTH(tanggal) = MONTH(CURRENT_DATE()) and YEAR(tanggal) = YEAR(CURRENT_DATE())';
        }else {
            $bulan = 'DATE_FORMAT(tanggal, "%Y-%m") = "'.$bulan.'"';
        }
        $data['pesanan_diproses'] = $this->m_pesanan_masuk->pesanan_diproses_bulanan($bulan);
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        //RULES

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('laporan/bulanan', $data);
        $this->load->view('template/footer');
    }

    public function laporan_harian()
    {
        $hari1 = $this->input->post('hari1');
        $hari2 = $this->input->post('hari2');

        $data['tittle'] = 'Laporan';
        
        if ($hari1 && $hari2 == null) {
            $hari1 = 'tanggal = CURRENT_DATE()';
            $hari2 = 'tanggal = CURRENT_DATE()';
        }else {
            $hari1 = 'tanggal >= "'.$hari1.'"';
            $hari2 = 'tanggal <= "'.$hari2.'"';
        }
        $data['pesanan_diproses'] = $this->m_pesanan_masuk->pesanan_diproses_harian($hari1,$hari2);
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        //RULES

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('laporan/harian', $data);
        $this->load->view('template/footer');
    }
}

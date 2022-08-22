<?php
defined('BASEPATH') or exit('No direct script access allowed');
class layanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function print()
    {

        $data = [
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'tittle' => 'Print',
            'print' => $this->db->get('tb_print')->result_array()
        ];
        $this->load->view('template/header-web', $data);
        $this->load->view('layanan/print', $data);
        $this->load->view('template/footer-web');
    }
    public function cetakfoto()
    {
        $data = [
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'tittle' => 'Cetak Foto',
            'cetakfoto' => $this->db->get('tb_cetakfoto')->result_array()
        ];
        $this->load->view('template/header-web', $data);
        $this->load->view('layanan/cetakfoto', $data);
        $this->load->view('template/footer-web');
    }
}

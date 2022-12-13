<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pesananmasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_pesanan_masuk');
    }


    public function index()
    {
        $data['tittle'] = 'Pesanan Masuk';
        $data['pesanan'] = $this->m_pesanan_masuk->pesanan();
        $data['pesanan_diproses'] = $this->m_pesanan_masuk->pesanan_diproses();
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        //RULES

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('pesananmasuk/index', $data);
        $this->load->view('template/footer');
    }
    public function proses($id_transaksi)
    {

        $no_resi = $this->input->post('no_resi');
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1',
            'no_resi' => $no_resi
        );
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('tb_transaksi', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pesanan berhasil diproses!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('pesananmasuk');
    }
    public function edit()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $total_bayar = $this->input->post('total_bayar');
        $data = array(
            'total_bayar' => $total_bayar
        );
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('tb_transaksi', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data telah diupdate!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('pesananmasuk');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pesanansaya extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $data = [
            'tittle' => 'Pesanan Saya',
            'belum_bayar' => $this->m_transaksi->belum_bayar(),
            'diproses' => $this->m_transaksi->diproses(),
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'kategori' => $this->db->get('tb_kategori')->result_array()

        ];
        $this->load->view('template/header-web', $data);
        $this->load->view('web-toko/pesanansaya', $data);
        $this->load->view('template/footer-web');
    }
    public function bayar($id_transaksi)
    {
        $data = [
            'tittle' => 'Pembayaran',
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'pesanan' => $this->m_transaksi->detail_pesanan($id_transaksi),
            'rekening' => $this->m_transaksi->rekening(),
            'kategori' => $this->db->get('tb_kategori')->result_array(),
            'transaksi' => $this->db->get('tb_transaksi')->result_array()
        ];
        $this->form_validation->set_rules(
            'atas_nama',
            'atas_nama',
            'trim|required',
            ['required' => 'Masukkan Nama']
        );
        $this->form_validation->set_rules(
            'nama_bank',
            'nama_bank',
            'trim|required',
            ['required' => 'Masukkan Nama Bank']
        );
        $this->form_validation->set_rules(
            'no_rek',
            'no_rek',
            'trim|required',
            ['required' => 'Masukkan No Rekening']
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header-web', $data);
            $this->load->view('web-toko/bayar', $data);
            $this->load->view('template/footer-web');
        } else {
            $id_transaksi = $this->input->post('id_transaksi', true);
            $atas_nama =  $this->input->post('atas_nama', true);
            $nama_bank = $this->input->post('nama_bank', true);
            $no_rek = $this->input->post('no_rek', true);
            $status_bayar = 1;
            $upload_image = $_FILES['bukti_bayar'];
            if ($upload_image) {
                $config['upload_path']          = './assets/img/buktibayar/';
                $config['allowed_types']        = 'gif|jpg|PNG|png|jpeg';
                $config['max_size']             = 10000;
                $this->upload->initialize($config);
                if ($this->upload->do_upload('bukti_bayar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('bukti_bayar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array(
                'atas_nama' => $atas_nama,
                'nama_bank' => $nama_bank,
                'no_rek' => $no_rek,
                'status_bayar' => $status_bayar,
            );
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('tb_transaksi', $data);
            $this->session->set_flashdata('pesan', 'Pesanan anda telah dibayar!');
            redirect('pesanansaya');
        }
    }
    public function hapus($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('tb_transaksi');
        $this->session->set_flashdata('batal', '<div class="alert alert-danger" role="alert">Pesanan anda telah dibatalkan!</div>');
        redirect('pesanansaya');
    }
}

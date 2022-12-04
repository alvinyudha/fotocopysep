<?php
defined('BASEPATH') or exit('No direct script access allowed');
class layanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function print()
    {

        $data = [
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'tittle' => 'Print',
        ];
        $this->load->view('template/header-web', $data);
        $this->load->view('layanan/print', $data);
        $this->load->view('template/footer-web');
    }
    public function tambahfilecetak()
    {
        $jumlah = $this->input->post('jumlah');
        $ukuran = $this->input->post('ukuran');
        $harga = $this->input->post('harga');
        $id_user = $this->input->post('id_user');
        $nama_pelanggan = $this->input->post('nama_pelanggan');

        $nama = $_FILES['nama'];
        if ($nama = '') {
        } else {
            $config['upload_path']          = './assets/barang/';
            $config['allowed_types']        = 'pdf|jpg|jpeg|docx|xlsx';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('nama')) {
                echo "Gagal Menambahkan";
            } else {
                $nama = $this->upload->data('file_name');
            }
        }
        $data = array(
            'jumlah' => $jumlah,
            'ukuran' => $ukuran,
            'nama' => $nama,
            'nama_pelanggan' => $nama_pelanggan,
            'id_user' => $id_user,
            'harga' => $jumlah * $harga

        );
        $this->db->insert('tb_filepesanan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang telah ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

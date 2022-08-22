<?php
defined('BASEPATH') or exit('No direct script access allowed');
class transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud', 'crud');
    }

    public function index()
    {
        $data['tittle'] = 'Transaksi';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_barang'] = $this->crud->tampil('tb_barang')->result();
        $data['barang'] = $this->db->get('tb_barang')->result_array();
        //mengambil id penjualan terakhir
        $id_penjualan = $id_penjualan = $this->crud->tampil_orader('id_penjualan', 'tb_penjualan', 'DESC')->row();
        if (empty($id_penjualan)) {
            $data['kode_jual'] = 1;
            $kode['id_penjualan'] = 1;
        } else {
            $data['kode_jual'] = $id_penjualan->id_penjualan + 1;
            $kode['id_penjualan'] = $id_penjualan->id_penjualan + 1;
        }
        $data['detail_beli'] = $this->crud->tampil_join('tb_barang', 'tb_detail_penjualan', 'tb_barang.id_barang = tb_detail_penjualan.id_produk', $kode)->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('template/footer');
    }
    function beli($id)
    {
        //untuk menampilkan data harga satuan
        $where['id_barang'] = $id;
        $barang = $this->crud->tampil_id('tb_barang', $where)->row();
        //mengambil id penjualan terakhir
        $id_penjualan = $id_penjualan = $this->crud->tampil_orader('id_penjualan', 'tb_penjualan', 'DESC')->row();
        if (empty($id_penjualan)) {
            $kode_jual = 1;
        } else {
            $kode_jual = $id_penjualan->id_penjualan + 1;
        }
        //mengecek barang di keranjang
        $wherecek['id_produk'] = $id;
        $wherecek['id_penjualan'] = $kode_jual;
        $cekpenjualan = $this->crud->tampil_id('tb_detail_penjualan', $wherecek)->row();
        if (empty($cekpenjualan)) {
            $field['id_produk'] = $id;
            $field['id_penjualan'] = $kode_jual;
            $field['jumlah_beli'] = 1;
            $field['harga_satuan'] = $barang->harga_jual;
            $this->crud->tambah('tb_detail_penjualan', $field);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang telah dimasukkan ke keranjang!</div>');
            $field['jumlah_beli'] = $cekpenjualan->jumlah_beli + 1;
            $this->crud->edit('tb_detail_penjualan', $field, $wherecek);
        }
        redirect('transaksi');
    }
    function hapus($id)
    {
        $pecah = explode('-', $id);
        $where['id_penjualan'] = $pecah[0];
        $where['id_produk'] = $pecah[1];
        $this->crud->hapus('tb_detail_penjualan', $where);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Barang telah dihapus!</div>');
        redirect('transaksi');
    }
}

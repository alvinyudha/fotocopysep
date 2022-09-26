<?php
class M_pesanan_masuk extends CI_Model
{
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result_array();
    }
    public function pesanan_diproses()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result_array();
    }
    public function total_pesanan_masuk()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('status_bayar=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->num_rows();
    }
    public function transaksi_pesanan()
    {
        $this->db->select('tb_barang.nama_kategori, tb_barang.nama_barang,tb_barang.merk,tb_barang.gambar_barang,tb_barang.harga_barang,tb_transaksi.no_order,tb_transaksi.tanggal,tb_transaksi.nama_penerima,tb_transaksi.telp_penerima,tb_rinci_transaksi.qty');
        $this->db->from('tb_barang,tb_transaksi,tb_rinci_transaksi');
        $this->db->where('tb_barang.id_barang = tb_rinci_transaksi.id_barang and tb_rinci_transaksi.no_order = tb_transaksi.no_order');
        $this->db->order_by('tb_transaksi.tanggal', 'desc');
        return $this->db->get()->result_array();
    }
}

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
}

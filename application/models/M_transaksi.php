<?php
class M_transaksi extends CI_Model
{
    public function simpan_transaksi($data)
    {
        $this->db->insert('tb_transaksi', $data);
    }
    public function simpan_rinci_transaksi($data_rinci)
    {
        $this->db->insert('tb_rinci_transaksi', $data_rinci);
    }
    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result_array();
    }
    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result_array();
    }
    public function detail_pesanan($id_transaksi)
    {
        return $this->db->get_where('tb_transaksi', ['id_transaksi' => $id_transaksi])->row();
    }
    public function rekening()
    {
        $this->db->select('*');
        $this->db->from('tb_rekening');
        return $this->db->get()->result();
    }
}

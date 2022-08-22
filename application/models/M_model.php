<?php
class M_model extends CI_Model
{
    public function getKeyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('nama_kategori', $keyword);
        $this->db->or_like('merk', $keyword);
        return $this->db->get()->result_array();
    }

    public function getBarang($limit, $start, $keyword = null)
    {
        if ('keyword') {
            $this->db->like('nama_barang', $keyword);
            $this->db->or_like('nama_kategori', $keyword);
            $this->db->or_like('merk', $keyword);
        }
        return $this->db->get('tb_barang', $limit, $start)->result_array();
    }

    public function getCetakFoto($limit, $start)
    {
        return $this->db->get('tb_cetakfoto', $limit, $start)->result_array();
    }

    public function countCetakFoto()
    {
        return $this->db->get('tb_cetakfoto')->num_rows();
    }

    public function countBarang()
    {
        return $this->db->get('tb_barang')->num_rows();
    }

    //user
    public function getDataUserById($id)
    {
        return $this->db->get_where('tb_user', ['id' => $id])->row_array();
    }
    //role
    public function hapus_role($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user_role');
    }
    //menu
    public function hapus_menu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user_menu');
    }
    public function hapus_submenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user_submenu');
    }

    //get data joinan
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_barang.id_kategori', 'left');
        $this->db->order_by('id_barang', 'desc');
        return $this->db->get()->result();
    }
    //kategori

    public function get_all_data_kategori()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }
    public function kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get()->row();
    }
    //barang
    public function get_all_data_barang($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_barang.id_kategori', 'left');
        $this->db->where('tb_barang.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }
    public function detail_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori=tb_barang.id_kategori', 'left');
        $this->db->order_by('id_barang', $id_barang);
        return $this->db->get()->row();
    }
    public function getDataBarangById($id_barang)
    {
        return $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
    }
    public function getDataFotoById($id)
    {
        return $this->db->get_where('tb_cetakfoto', ['id' => $id])->row_array();
    }

    //total
    public function total_kategori()
    {
        return $this->db->get('tb_kategori')->num_rows();
    }
    public function total_barang()
    {
        return $this->db->get('tb_barang')->num_rows();
    }
    // public function detailBarang($id_barang)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tb_barang');
    //     $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_barang.id_kategori', 'left');
    //     $this->db->where('id_barang', $id_barang);
    //     return $this->db->get()->row();
    // }

    public function editBarang()
    {
        $data = [
            "nama_kategori" => $this->input->post('nama_kategori', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "merk" => $this->input->post('merk', true),
            "harga_barang" => $this->input->post('harga_barang', true),
            "satuan" => $this->input->post('satuan', true),
            "stok" => $this->input->post('stok', true)
        ];
        $this->db->where('id_barang', $this->input->post('id_barang'));
        $this->db->update('tb_barang', $data);
    }

    //supplier
    public function hapus_supplier($id_supplier)
    {
        $this->db->where('id_supplier', $id_supplier);
        $this->db->delete('tb_supplier');
    }

    public function getMax($table = null, $field = null)
    {
        $this->db->select_max($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function getSubmenu()
    {
        $query = "SELECT `tb_user_submenu`.*, `tb_user_menu`.`menu`
                FROM `tb_user_submenu` JOIN `tb_user_menu`
                ON `tb_user_submenu`.`menu_id` = `tb_user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }
}

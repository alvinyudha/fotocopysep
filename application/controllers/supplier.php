<?php
defined('BASEPATH') or exit('No direct script access allowed');
class supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_model');
    }

    public function index()
    {
        $data['tittle'] = 'Data Supplier';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();

        $data['supplier'] = $this->db->get('tb_supplier')->result_array();

        //RULES
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required', []);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', []);
        $this->form_validation->set_rules('phone', 'Phone', 'required', []);
        $this->form_validation->set_rules('keterangan', ' Keterangan', 'required', []);
        if ($this->form_validation->run() == false) { //jika gagal maka
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('supplier/index', $data);
            $this->load->view('template/footer');
        } else { //jika berhasil maka
            $data = [
                'nama_supplier' => $this->input->post('nama_supplier'),
                'alamat' => $this->input->post('alamat'),
                'phone' => $this->input->post('phone'),
                'keterangan' => $this->input->post('keterangan'),
            ];
            $this->db->insert('tb_supplier', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Supplier telah ditambahkan!</div>');
            redirect('supplier');
        }
    }



    public function hapus_supplier($id_supplier)
    {
        $this->M_model->hapus_supplier($id_supplier);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Supplier telah dihapus!</div>');
        redirect('supplier');
    }
}

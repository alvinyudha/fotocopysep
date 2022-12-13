<?php
defined('BASEPATH') or exit('No direct script access allowed');
class kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_model');
    }

    public function index()
    {
        $data['tittle'] = 'Data Kategori';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();

        //RULES
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', [
            'required' => 'Gagal menambahkan kategori'
        ]);

        if ($this->form_validation->run() == false) { //jika gagal maka
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('kategori/index', $data);
            $this->load->view('template/footer');
        } else { //jika berhasil maka
            $this->db->insert('tb_kategori', ['nama_kategori' => $this->input->post('nama_kategori')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori telah ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
            redirect('kategori');
        }
    }


    public function hapus($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('tb_kategori');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data kategori telah dihapus!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('kategori');
    }

    public function edit()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
        $data = array(
            'nama_kategori' => $nama_kategori
        );
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('tb_kategori', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori telah diubah!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('kategori');
    }
}

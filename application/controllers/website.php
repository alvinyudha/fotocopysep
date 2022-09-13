<?php
defined('BASEPATH') or exit('No direct script access allowed');
class website extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['M_model' => 'm_model']);
    }

    public function index()
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();
        $data['barang'] = $this->db->get('tb_barang')->result_array();
        $data['tittle'] = 'Home';
        $this->load->view('template/header-web', $data);
        $this->load->view('web-toko/index', $data);
        $this->load->view('template/footer-web');
    }
    public function kategori($id_kategori)
    {

        $kategori = $this->m_model->kategori($id_kategori);
        $data = [
            'tittle' => 'Kategori Barang : ' . $kategori->nama_kategori,
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'barang' => $this->db->get_where('tb_barang', ['id_kategori' => $id_kategori])->result_array(),
            'kategori' => $this->db->get('tb_kategori')->result_array()
        ];
        $this->load->view('template/header-web', $data);
        $this->load->view('web-toko/kategori', $data);
        $this->load->view('template/footer-web');
    }
    public function detail($id_barang)
    {

        $data = [
            'tittle' => 'Detail Barang',
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'barang' => $this->m_model->getDataBarangById($id_barang),
            'kategori' => $this->db->get('tb_kategori')->result_array()
        ];
        $this->load->view('template/header-web', $data);
        $this->load->view('web-toko/detail', $data);
        $this->load->view('template/footer-web');
    }
    public function cetakfoto()
    {

        $data = [
            'tittle' => 'Cetak Foto',
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'kategori' => $this->db->get('tb_kategori')->result_array(),
            'cetakfoto' => $this->db->get('tb_cetakfoto')->result_array()
        ];
        $this->load->view('template/header-web', $data);
        $this->load->view('web-toko/cetakfoto', $data);
        $this->load->view('template/footer-web');
    }
    public function formcetak($id)
    {
        $data = [
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'tittle' => 'Form Cetak',
            'foto' => $this->m_model->getDataFotoById($id),

        ];

        $this->load->view('template/header-web', $data);
        $this->load->view('web-toko/formcetak', $data);
        $this->load->view('template/footer-web');
    }

    public function tambahformcetak()
    {
        $jumlah = $this->input->post('jumlah');
        $ukuran = $this->input->post('ukuran');
        $harga = $this->input->post('harga');
        $id_user = $this->input->post('id_user');

        $nama = $_FILES['nama'];
        if ($nama = '') {
        } else {
            $config['upload_path']          = './assets/barang/';
            $config['allowed_types']        = 'jpg|jpeg|png|gif';

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
            'id_user' => $id_user,
            'harga' => $jumlah * $harga

        );
        $this->db->insert('tb_filepesanan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang telah ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function tambahfilecetak()
    {
        $jumlah = $this->input->post('jumlah');
        $ukuran = $this->input->post('ukuran');
        $harga = $this->input->post('harga');
        $id_user = $this->input->post('id_user');

        $nama = $_FILES['nama'];
        if ($nama = '') {
        } else {
            $config['upload_path']          = './assets/barang/';
            $config['allowed_types']        = 'pdf';

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
            'id_user' => $id_user,
            'harga' => $jumlah * $harga

        );
        $this->db->insert('tb_filepesanan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang telah ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function search()
    {
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();

        $data['tittle'] = 'Home';
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->m_model->getKeyword($keyword);
        $this->load->view('template/header-web', $data);
        $this->load->view('web-toko/index', $data);
        $this->load->view('template/footer-web');
    }
}

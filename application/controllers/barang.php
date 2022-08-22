<?php
defined('BASEPATH') or exit('No direct script access allowed');
class barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_model');
        $this->data['aktif'] = 'barang';
        //RULES
        $this->form_validation->set_rules('nama_kategori', 'Kategori', 'required|trim', ['required' => 'Pilih Kategori']);
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required', []);
        $this->form_validation->set_rules('merk', 'Merk', 'required', []);
        $this->form_validation->set_rules('harga_barang', 'Harga beli', 'required', []);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required', []);
        $this->form_validation->set_rules('stok', 'Stok', 'required', []);
    }

    public function index()
    {
        //config
        $config['base_url'] = 'http://localhost/logintoko/barang/index';
        $config['total_rows'] = $this->m_model->countBarang();
        $config['per_page'] = 10;

        //styling
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul> </nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        //initialize
        $this->pagination->initialize($config);


        $data['tittle'] = 'Data Barang';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(); //mengambil data dari user berdasarkan email yg ada di session 
        $data['no'] = 1;
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();

        $data['databarang'] = $this->m_model->get_all_data();
        $data['start'] = $this->uri->segment(3);
        $data['barang'] = $this->m_model->getBarang($config['per_page'], $data['start'], $data['keyword']);


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $nama_kategori = $this->input->post('nama_kategori');
        $nama_barang = $this->input->post('nama_barang');
        $merk = $this->input->post('merk');
        $harga_barang = $this->input->post('harga_barang');
        $deskripsi = $this->input->post('deskripsi');
        $satuan = $this->input->post('satuan');
        $stok = $this->input->post('stok');
        $gambar_barang = $_FILES['gambar_barang'];
        if ($gambar_barang = '') {
        } else {
            $config['upload_path']          = './assets/barang/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_barang')) {
                echo "Gagal Menambahkan";
            } else {
                $gambar_barang = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_kategori' => $nama_kategori,
            'nama_barang' => $nama_barang,
            'merk' => $merk,
            'harga_barang' => $harga_barang,
            'deskripsi' => $deskripsi,
            'satuan' => $satuan,
            'stok' => $stok,
            'gambar_barang' => $gambar_barang
        );
        $this->db->insert('tb_barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang telah ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('barang/index');
    }

    public function edit()
    {
        $id_barang = $this->input->post('id_barang');
        $nama_kategori = $this->input->post('nama_kategori');
        $nama_barang = $this->input->post('nama_barang');
        $merk = $this->input->post('merk');
        $harga_barang = $this->input->post('harga_barang');
        $deskripsi = $this->input->post('deskripsi');
        $satuan = $this->input->post('satuan');
        $stok = $this->input->post('stok');
        $upload_image = $_FILES['gambar_barang'];
        if ($upload_image) {
            $config['upload_path']          = './assets/barang';
            $config['allowed_types']        = 'gif|jpg|PNG|png|jpeg';
            $config['max_size']             = '10000';
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar_barang')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar_barang', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = array(
            'nama_kategori' => $nama_kategori,
            'nama_barang' => $nama_barang,
            'merk' => $merk,
            'harga_barang' => $harga_barang,
            'deskripsi' => $deskripsi,
            'satuan' => $satuan,
            'stok' => $stok
        );
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang telah diubah!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('barang');
    }

    public function detail($id_barang)
    {
        $data['barang'] = $this->m_model->getDataBarangById($id_barang);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Barang telah dihapus!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('barang');
    }

    // public function tambah()
    // {
    //     $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['tittle'] = 'Tambah Data';
    //     $data['barang'] = $this->db->get('tb_barang')->result_array();
    //     $data['kategori'] = $this->db->get('tb_kategori')->result_array();
    //     if ($this->form_validation->run() == false) { //jika gagal maka

    //     } else { //jika berhasil maka data tampil

    //         $data = [
    //             'nama_kategori' => $this->input->post('nama_kategori', true),
    //             'nama_barang' => $this->input->post('nama_barang', true),
    //             'merk' => $this->input->post('merk', true),
    //             'harga_barang' => $this->input->post('harga_barang', true),
    //             'satuan' => $this->input->post('satuan', true),
    //             'stok' => $this->input->post('stok', true),

    //         ];
    //         $this->db->insert('tb_barang', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang telah ditambahkan!</div>');
    //         redirect('barang');
    //     }
    // }
}

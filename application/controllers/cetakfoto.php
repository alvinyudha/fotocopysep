<?php
defined('BASEPATH') or exit('No direct script access allowed');
class cetakfoto extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->form_validation->set_rules('paket', 'Paket', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
    }

    public function index()
    {
        $config['base_url'] = 'http://localhost/logintoko/cetakfoto/index';
        $config['total_rows'] = $this->m_model->countCetakFoto();
        $config['per_page'] = 5;

        //styling
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = ' </ul> </nav>';

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

        //initialize
        $this->pagination->initialize($config);

        $data = [
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'tittle' => 'Cetak Foto',
        ];
        $data['start'] = $this->uri->segment(3);
        $data['cetakfoto'] = $this->m_model->getCetakFoto($config['per_page'], $data['start']);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('cetakfoto/index', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $paket = $this->input->post('paket');
        $harga = $this->input->post('harga');
        $gambar = $_FILES['gambar'];
        if ($gambar = '') {
        } else {
            $config['upload_path']          = './assets/barang/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gagal Menambahkan";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'paket' => $paket,
            'harga' => $harga,
            'gambar' => $gambar,
        );
        $this->db->insert('tb_cetakfoto', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('cetakfoto');
    }
    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_cetakfoto');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data telah dihapus!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('cetakfoto');
    }
    public function edit()
    {
        $id = $this->input->post('id');
        $paket = $this->input->post('paket');
        $harga = $this->input->post('harga');
        $upload_image = $_FILES['gambar'];
        if ($upload_image) {
            $config['upload_path']          = './assets/barang';
            $config['allowed_types']        = 'gif|jpg|PNG|png|jpeg';
            $config['max_size']             = '10000';
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $data = array(
            'paket' => $paket,
            'harga' => $harga,
        );
        $this->db->where('id', $id);
        $this->db->update('tb_cetakfoto', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah diubah!<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
        redirect('cetakfoto');
    }
}

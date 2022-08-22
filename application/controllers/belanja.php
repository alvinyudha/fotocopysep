<?php
defined('BASEPATH') or exit('No direct script access allowed');
class belanja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('website');
        }
        $data = [
            'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
            'tittle' => 'Keranjang',
            'kategori' => $this->db->get('tb_kategori')->result_array()
        ];
        $this->load->view('template/header-web', $data);
        $this->load->view('web-toko/belanja', $data);
        $this->load->view('template/footer-web');
    }
    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price')
        );
        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }
    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {

            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]')
            );

            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Keranjang Berhasil Di Ubah!!!');
        redirect('belanja');
    }
    public function hapus($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }
    public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }
    public function checkout()
    {

        $this->form_validation->set_rules('nama_penerima', 'nama_penerima', 'trim|required', ['required' => 'Tidak boleh kosong!']);
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', ['required' => 'Tidak boleh kosong!']);
        $this->form_validation->set_rules('telp_penerima', 'telp_penerima', 'trim|required', ['required' => 'Tidak boleh kosong!']);

        if ($this->form_validation->run() == false) {
            $data = [
                'tb_user' => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
                'tittle' => 'Check Out',
                'kategori' => $this->db->get('tb_kategori')->result_array()
            ];
            $this->load->view('template/header-web', $data);
            $this->load->view('web-toko/checkout', $data);
            $this->load->view('template/footer-web');
        } else {
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'no_order' => $this->input->post('no_order'),
                'tanggal' => date('Y-m-d'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'telp_penerima' => $this->input->post('telp_penerima'),
                'alamat' => $this->input->post('alamat'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_bayar' => 0,
                'status_order' => 0,
            );
            $this->m_transaksi->simpan_transaksi($data);
            $i = 1;
            foreach ($this->cart->contents() as $items) {
                $data_rinci = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_barang' => $items['id'],
                    'qty' => $this->input->post('qty' . $i++),
                );
                $this->m_transaksi->simpan_rinci_transaksi($data_rinci);
            }
            $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses!!!');
            redirect('pesanansaya');
        }
    }
}

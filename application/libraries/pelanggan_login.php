<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('name') == '') {
            $this->ci->session->$this->session->set_flashdata('error', 'Anda Belum Login !!!');
            redirect('auth');
        }
    }
}

/* End of file LibraryName.php */

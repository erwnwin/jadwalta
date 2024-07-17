<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bantuan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Bantuan : SiJadwalTa";

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/bantuan', $data);
        $this->load->view('template/footer', $data);
    }
}

/* End of file Bantuan.php */

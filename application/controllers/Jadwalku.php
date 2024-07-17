<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwalku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_hari');
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Jadwal Saya : SiJadwalTa";

        $data['hari'] = $this->m_hari->tampil_hari();
        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('guru/jadwalku', $data);
        $this->load->view('template/footer', $data);
    }
}

/* End of file Jadwalku.php */

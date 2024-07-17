<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kelas');
    }


    public function index()
    {
        $data['title'] = "Jadwal : SiJadwalTa";
        $data['kelas'] = $this->m_kelas->tampil_kelas();

        $this->load->view('depan/head', $data);
        $this->load->view('depan/header', $data);
        $this->load->view('jadwal_kelas', $data);
        $this->load->view('depan/footer', $data);
    }
}

/* End of file Jadwal_kelas.php */

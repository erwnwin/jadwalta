<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_khusus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kelas');
        $this->load->model('m_jadwal');
        $this->load->model('m_khusus');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Jadwal Khusus : SiJadwalTa";

        $data = [
            'title' => "Jadwal Khusus : SiJadwalTa",
            'jadwal_khusus' => $this->m_khusus->getAllData(),
            'dataKelas' => $this->m_kelas->getAllData(),
            'jadwal' => $this->m_jadwal->getAllData(),
        ];

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/jadwal_khusus', $data);
        $this->load->view('template/footer', $data);
    }


    public function views()
    {
        // $data['title'] = "Jadwal Khusus : SiJadwalTa";
        // $this->load->database();
        $data = [
            'title' => "Jadwal Khusus : SiJadwalTa",
            'jadwal_khusus' => $this->m_khusus->getAllData(),
            'dataKelas' => $this->m_kelas->getAllData(),
            'jadwal' => $this->m_jadwal->getAllData(),
        ];


        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/jadwal_khusus_cop', $data);
        $this->load->view('template/footer', $data);
    }

    public function act_add()
    {
        $this->m_khusus->tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data jadwal khusus berhasil disimpan!
        </div>');
        redirect(base_url('jadwal-khusus'));
    }
}

/* End of file Jadwal_khusus.php */

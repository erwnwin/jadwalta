<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Request_jadwal extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_req');
        $this->load->model('m_guru');
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Request Jadwal : SiJadwalTa";

        $data['req'] = $this->m_req->getAllData();
        $data['guru'] = $this->m_guru->getAll()->result();

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/request', $data);
        $this->load->view('template/footer', $data);
    }

    public function act_add()
    {
        $this->m_req->tambah_data();
    }
}

/* End of file Request_jadwal.php */

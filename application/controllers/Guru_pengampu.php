<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

defined('BASEPATH') or exit('No direct script access allowed');

class Guru_pengampu extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
        $this->load->model('m_guru');
        $this->load->model('m_mapel');
        $this->load->model('m_kelas');
        $this->load->model('m_pengampu');
    }


    public function index()
    {
        $data['title'] = "Guru Pengampu : SiJadwalTa";

        $data['guru'] = $this->m_guru->getAll()->result();
        $data['mapel'] = $this->m_mapel->mapelKosong();
        $data['kelas'] = $this->m_kelas->tampil_kelas();

        $data['tugas_guru'] = $this->m_pengampu->getAllData();

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/guru_pengampu', $data);
        $this->load->view('template/footer', $data);
    }



    public function create_pengampu($kode_mapel)
    {
        $data['title'] = "Create Guru Pengampu : SiJadwalTa";

        $data['kodeMapel'] = $kode_mapel;
        $data['dataMapel'] = $this->m_pengampu->dataKelasByKodeMapel($kode_mapel);
        $data['guru'] = $this->m_guru->getAll()->result();
        $data['nama_mapel'] = $this->m_mapel->getMapelbyKodeMapel($kode_mapel);

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/create_guru_pengampu', $data);
        $this->load->view('template/footer', $data);
    }


    public function act_add()
    {
        $this->m_pengampu->tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data guru pengampu berhasil disimpan!
        </div>');
        redirect(base_url('guru-pengampu'));
    }

    public function hapus()
    {
        $this->m_pengampu->hapus_data($this->input->post('id_tugas'));
    }
}

/* End of file Guru_pengampu.php */

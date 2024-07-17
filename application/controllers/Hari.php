<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Hari extends CI_Controller
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
        $data['title'] = "Hari : SiJadwalTa";

        $data['hari'] = $this->m_hari->tampil_hari();

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/hari', $data);
        $this->load->view('template/footer', $data);
    }

    public function add_act()
    {
        $kode_mapel = $this->input->post('kode_mapel');
        $nama = $this->input->post('nama');
        $jp = $this->input->post('jp');
        $semester = $this->input->post('semester');
        $jenis = $this->input->post('jenis');

        $data = array(
            'kode_mapel' => $kode_mapel,
            'nama' => $nama,
            'jp' => $jp,
            'semester' => $semester,
            'jenis' => $jenis,
        );

        $this->db->insert('set_hari', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data mata pelajaran berhasil disimpan!
        </div>');
        redirect(base_url('mata-pelajaran'));
    }
}

/* End of file Hari.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ruangan');
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Ruangan : SiJadwalTa";

        $data['ruang'] = $this->m_ruangan->tampil_ruangan();
        // $data['jurusan'] = $this->m_ruangan->jurusan();

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/ruangan', $data);
        $this->load->view('template/footer', $data);
    }

    public function add_act()
    {
        $nama_ruangan = $this->input->post('nama_ruangan');
        $jenis = $this->input->post('jenis');

        $data = array(
            'nama_ruangan' => $nama_ruangan,
            'jenis' => $jenis,
        );

        $this->db->insert('ruang', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data ruangan berhasil disimpan!
        </div>');
        redirect(base_url('ruangan'));
    }

    public function edit_act()
    {
        $id = $this->input->post('id');
        $nama_ruangan = $this->input->post('nama_ruangan');
        $jenis = $this->input->post('jenis');

        $data = array(
            'id' => $id,
            'nama_ruangan' => $nama_ruangan,
            'jenis' => $jenis,
        );


        $where = array(
            'id' => $id,
        );

        $this->db->update('ruang', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Update</h4>
        Data ruangan berhasil terupdate!
        </div>');
        redirect(base_url('ruangan'));
    }
}

/* End of file Ruangan.php */

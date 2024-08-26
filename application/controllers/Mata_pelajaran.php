<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mata_pelajaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mapel');
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Mata Pelajaran : SiJadwalTa";

        $data['mapel'] = $this->m_mapel->mapel();
        $data['mapelku'] = $this->m_mapel->getAllData();

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/mata_pelajaran', $data);
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

        $this->db->insert('mapel', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data mata pelajaran berhasil disimpan!
        </div>');
        redirect(base_url('mata-pelajaran'));
    }

    public function validation_form()
    {
        $this->m_mapel->tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data mata pelajaran berhasil disimpan!
        </div>');
        redirect(base_url('mata-pelajaran'));
    }


    public function delete_mapel($kode_mapel)
    {
        // Cek apakah kode_mapel digunakan oleh guru pengampu
        $this->db->select('kode_mapel');
        $this->db->from('guru_pengampu');
        $this->db->where('kode_mapel', $kode_mapel);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Jika ada data di tabel guru_pengampu yang berelasi dengan kode_mapel
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Gagal Hapus</h4>
            Data tidak dapat dihapus karena mapel telah ada guru pengampunya. Silahkan lakukan edit saja.
            </div>');
            redirect(base_url('mata-pelajaran'));
        } else {
            // Hapus data dari tabel mapelku dan tabel terkait lainnya
            $this->db->where('kode_mapel', $kode_mapel);
            $this->db->delete('mapelku');

            // Hapus data dari tabel terkait lainnya jika ada
            // $this->db->where('kode_mapel', $kode_mapel);
            // $this->db->delete('kelasku'); // Misalnya, jika ada tabel kelas terkait

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses</h4>
            Data mapel berhasil dihapus!
            </div>');
            redirect(base_url('mata-pelajaran'));
        }
    }
}

/* End of file Mata_pelajaran.php */

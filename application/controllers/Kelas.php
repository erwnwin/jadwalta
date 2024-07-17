<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kelas');
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Kelas : SiJadwalTa";

        $data['kelas'] = $this->m_kelas->tampil_kelas();
        $data['ruang'] = $this->m_kelas->ruang();

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('template/footer', $data);
    }

    public function add_act()
    {
        $kelas = $this->input->post('kelas');
        $urutan_kelas = $this->input->post('urutan_kelas');
        $id_ruang = $this->input->post('id_ruang');

        $data = array(
            'id_kelas' => 'Kelas' . $kelas . $urutan_kelas,
            'kelas' => $kelas,
            'urutan_kelas' => $urutan_kelas,
            'id_ruang' => $id_ruang,
        );

        $sql = $this->db->query("SELECT id_ruang FROM kelasku where id_ruang='$id_ruang'");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info-circle"></i> Sudah ada</h4>
            Data kelas untuk ruangan ini telah digunakan!
            </div>');
            redirect(base_url('kelas'));
        } else {

            $this->db->insert('kelasku', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data kelas berhasil disimpan!
        </div>');
            redirect(base_url('kelas'));
        }
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

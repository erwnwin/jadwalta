<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_akademik extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ta');
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Tahun Akademik : SiJadwalTa";

        $data['ta'] = $this->m_ta->tampil_ta();

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/tahun_akademik', $data);
        $this->load->view('template/footer', $data);
    }

    public function add_act()
    {
        $tahun_akademik = $this->input->post('tahun_akademik');
        $status = $this->input->post('status');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $tipe_semester = $this->input->post('tipe_semester');

        $data = array(
            'tahun_akademik' => $tahun_akademik,
            'status' => $status,
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
            'tipe_semester' => $tipe_semester,
        );

        $this->db->insert('tahun_akademik', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data tahun akademik berhasil disimpan!
        </div>');
        redirect(base_url('tahun-akademik'));
    }

    public function act_aktif($id_ta)
    {

        $id_ta = $this->input->post('id_ta');
        $status = 'Aktif';

        $data = array(
            'id_ta' => $id_ta,
            'status' => 'Aktif',
        );

        $where = array(
            'id_ta' => $id_ta,
        );

        $sql = $this->db->query("SELECT status FROM tahun_akademik where status='$status'");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Masih ada data yang aktif</h4>
            Silahkan menonaktifkan tahun akademik yang lampau!
            </div>');
            redirect(base_url('tahun-akademik'));
        } else {
            $this->db->update('tahun_akademik', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Diaktifkan</h4>
            Data tahun akademik berhasil diaktifkan!
            </div>');
            redirect(base_url('tahun-akademik'));
        }
    }

    public function act_nonaktif($id_ta)
    {

        $id_ta = $this->input->post('id_ta');
        $status = 'Aktif';

        $data = array(
            'id_ta' => $id_ta,
            'status' => 'Non Aktif',
        );

        $where = array(
            'id_ta' => $id_ta,
        );


        $this->db->update('tahun_akademik', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> DiNonAktifkan</h4>
            Data tahun akademik berhasil diNonAktifkan!
            </div>');
        redirect(base_url('tahun-akademik'));
    }
}

/* End of file Tahun_akademik.php */

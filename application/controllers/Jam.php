<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jam');
        $this->load->model('m_ta');
        $this->load->model('m_hari');
        $this->load->model('m_kelas');
        $this->load->model('m_mapel');
        $this->load->model('m_jadwal');
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Jam : SiJadwalTa";
        // $data['jam'] = $this->m_jam->tampil_jam();
        // $data['jam1'] = $this->m_jam->jam();
        // $data['jam2'] = $this->m_jam->tampil_jam2();
        // $data['jam3'] = $this->m_jam->tampil_kelas();


        // $data['ta'] = $this->m_ta->tampil_ta();
        // $data['hari'] = $this->m_hari->tampil_hari();

        $data['kelas'] = $this->m_kelas->tampil_kelas();
        // $data['ruang'] = $this->m_kelas->ruang();
        // $data['jam'] = $this->m_jam->tampil_jam();

        $data['range_jam'] = $this->m_jam->getAllData();

        // $data['mapel'] = $this->m_mapel->mapel();

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/jam', $data);
        $this->load->view('template/footer', $data);
    }

    public function edit_act()
    {
        $id = $this->input->post('id');
        $range_jam = $this->input->post('range_jam');
        $waktu_shalat = $this->input->post('waktu_shalat');

        $data = array(
            'id' => $id,
            'range_jam' => $range_jam,
            'waktu_shalat' => $waktu_shalat,

        );

        $where = array(
            'id' => $id,
        );

        $this->db->update('jam', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Update</h4>
        Data jam berhasil terupdate!
        </div>');
        redirect(base_url('jam'));
    }

    public function validation_form()
    {
        $this->m_jadwal->update_act2();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data jam berhasil diset!
        </div>');
        redirect(base_url('jam'));
    }

    public function act_add()
    {
        $this->m_jam->tambah_data();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses</h4>
        Data range jam berhasil diset!
        </div>');
        redirect(base_url('jam'));
    }
}

/* End of file Jam.php */

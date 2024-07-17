<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }
    

    public function index()
    {
    }

    function add_ajax_mapel($id)
    {

        $query = $this->db->get_where('mapelku', array('id_kelas' => $id));
        $data = "<option value='' disabled selected> Pilih Mata Pelajaran </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id_mapel . "'>" . $value->nama_mapel . "</option>";
        }
        echo $data;
    }

    function add_ajax_jam($id)
    {
        $query = $this->db->get_where('set_jadwal', array('id_kelas' => $id));
        $data = "<option disabled selected> Pilih Kecamatan --</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    // function add_ajax_des($id_kec)
    // {
    //     $query = $this->db->get_where('wilayah_desa', array('kecamatan_id' => $id_kec));
    //     $data = "<option disabled selected>-- Pilih Desa --</option>";
    //     foreach ($query->result() as $value) {
    //         $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
    //     }
    //     echo $data;
    // }
}

/* End of file Jadwal.php */

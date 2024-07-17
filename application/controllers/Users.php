<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
        $data['title'] = "Users : SiJadwalTa";

        $telp_wa = '6282194460105';
        $data['jadwal'] = $this->db->query("SELECT penjadwalan.hari, penjadwalan.keterangan, guru.telp_wa
        FROM penjadwalan INNER JOIN guru ON guru.id_guru = penjadwalan.id_guru 
        WHERE guru.telp_wa='$telp_wa'")->result();

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/users', $data);
        $this->load->view('template/footer', $data);
    }
}

/* End of file Users.php */

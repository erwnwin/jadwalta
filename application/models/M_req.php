<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_req extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('*');
        $this->db->from('request_jadwal');
        $this->db->join('guru', 'request_jadwal.id_guru = guru.id_guru', 'left');
        return $this->db->get()->result();
    }

    public function tambah_data()
    {
        $hari = $this->input->post("chkHari");
        $id_guru = $this->input->post('id_guru');
        $data = array(
            'id_guru' => $this->input->post('id_guru'),
            'id_request' => $this->input->post('id_req'),
            'hari' => implode(',', (array) $hari)
        );
        $sql = $this->db->query("SELECT id_guru FROM request_jadwal where id_guru='$id_guru'");
        $cek = $sql->num_rows();
        if ($cek > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Gagal</h4>
            Data request jadwal gagal dibuat!
            </div>');
            redirect('request-jadwal');
        } else {
            $this->db->insert('request_jadwal', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses</h4>
            Data request jadwal berhasil dibuat!
            </div>');
            redirect('request-jadwal');
        }
    }
}

/* End of file M_req.php */

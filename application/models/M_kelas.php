<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kelas extends CI_Model
{
    public function tampil_kelas()
    {
        $this->db->select('*');
        $this->db->from('kelasku');
        $this->db->join('ruang', 'kelasku.id_ruang = ruang.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kelas_by_id($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get('kelasku');
        return $query->row(); // Mengembalikan satu baris data
    }

    public function ruang()
    {
        return $this->db->get('ruang')->result();
    }

    public function detail_data($id)
    {
        return $this->db->get_where('kelasku', ['id_kelas' => $id])->row_array();
    }


    public function getAllData()
    {
        $this->db->select('id_kelas, kelas, urutan_kelas');
        $this->db->from('kelasku');
        // $this->db->join('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan');
        // $this->db->order_by('kelas.id_jurusan', 'ASC');
        $this->db->order_by('kelasku.kelas', 'ASC');
        $this->db->order_by('kelasku.urutan_kelas', 'ASC');
        return $this->db->get()->result();
    }
}

/* End of file M_kelas.php */

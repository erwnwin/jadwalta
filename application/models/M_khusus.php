<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_khusus extends CI_Model
{

    // pagination
    function get_mahasiswa_list($limit, $start)
    {
        $this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
        $this->db->from('jadwal_khusus');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
    }


    public function getAllData()
    {
        $this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
        $this->db->from('jadwal_khusus');
        $this->db->group_by('hari');
        // $this->db->group_by('kelas');
        // $this->db->group_by('keterangan'); // Kelompokkan berdasarkan keterangan untuk mendapatkan data yang unik
        return $this->db->get()->result_array();
        // $this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
        // $this->db->from('jadwal_khusus');
        // return $this->db->get()->result_array();
    }

    

    public function getAllDataNew()
    {
        $this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
        $this->db->from('jadwal_khusus');
        return $this->db->get()->result_array();
    }

    // public function getJadwalWithSameKeterangan()
    // {
    //     $this->db->select('id_jadwal_khusus, kelas, hari, keterangan, sesi, durasi');
    //     $this->db->from('jadwal_khusus');
    //     $this->db->order_by('keterangan');
    //     $query = $this->db->get()->result_array();

    //     $result = [];
    //     foreach ($query as $row) {
    //         $result[$row['keterangan']][] = $row;
    //     }

    //     return $result;
    // }


    public function tambah_data()
    {
        $hari = $this->input->post('hari');
        $kelas = $this->input->post('kelas');
        foreach ($hari as $h) {
            foreach ($kelas as $k) {
                $data = array(
                    'hari' => $h,
                    'kelas' => $k,
                    'keterangan' => $this->input->post('keterangan'),
                    'sesi' => $this->input->post('sesi'),
                    'durasi' => $this->input->post('durasi')
                );
                $this->db->insert('jadwal_khusus', $data);
            }
        }
    }


    public function getJadwalKhusus_hari($kelas, $hari)
    {
        return $this->db->query("SELECT * FROM `jadwal_khusus` WHERE hari = '" . $hari . "' AND kelas LIKE '%" . $kelas . "' GROUP by sesi ")->result();
    }


    // function get_mahasiswa_all($limit, $offset)
    // {
    //     $this->db->select('tb_mahasiswa.nim, tb_mahasiswa.nama, tb_mahasiswa.tanggal_lahir,
    //         tb_mahasiswa.jenis_kelamin, tb_mahasiswa.alamat, tb_mahasiswa.propinsi,
    //         tb_mahasiswa.telepon, tb_mahasiswa.email, tb_mahasiswa.photo,
    //         tb_mahasiswa.prodi,
    //         tb_prodi.namaprodi');
    //     $this->db->from('tb_mahasiswa');
    //     $this->db->join('tb_prodi', 'tb_mahasiswa.prodi=tb_prodi.kode');
    //     //$query = $this->db->get();
    //     $this->db->order_by('nim', 'ASC');
    //     //$query = $this->db->get('tb_mahasiswa','tb_prodi',$limit, $offset);
    //     $query = $this->db->get($limit, $offset);
    //     return $query->result();
    // }
}

/* End of file M_khusus.php */

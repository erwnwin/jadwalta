<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {

        // $ip    = $this->input->ip_address(); // Mendapatkan IP user
        // $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        // $waktu = time(); //
        // $timeinsert = date("Y-m-d H:i:s");

        // // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        // $s = $this->db->query("SELECT * FROM visitors WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
        // $ss = isset($s) ? ($s) : 0;


        // // Kalau belum ada, simpan data user tersebut ke database
        // if ($ss == 0) {
        //     $this->db->query("INSERT INTO visitors(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
        // }

        // // Jika sudah ada, update
        // else {
        //     $this->db->query("UPDATE visitors SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        // }

        $ip = $this->input->ip_address(); // Mendapatkan IP user
        $date = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $timeinsert = date("Y-m-d H:i:s"); // Mendapatkan waktu sekarang
        $bataswaktu = time() - 300; // Waktu batas untuk pengunjung online

        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $this->db->where('ip', $ip);
        $this->db->where('date', $date);
        $query = $this->db->get('visitors');

        if ($query->num_rows() == 0) {
            // Kalau belum ada, simpan data user tersebut ke database
            $data = array(
                'ip' => $ip,
                'date' => $date,
                'hits' => 1,
                'online' => $timeinsert,
                'time' => $timeinsert
            );
            $this->db->insert('visitors', $data);
        } else {
            // Jika sudah ada, update
            $this->db->set('hits', 'hits+1', FALSE); // Update hits dengan penambahan
            $this->db->set('online', $timeinsert); // Update waktu online
            $this->db->where('ip', $ip);
            $this->db->where('date', $date);
            $this->db->update('visitors');
        }

        // Hitung jumlah pengunjung hari ini (dikelompokkan berdasarkan IP)
        $this->db->select('COUNT(*) AS numrows');
        $this->db->from('(SELECT ip FROM visitors WHERE date = "' . $date . '" GROUP BY ip) AS CI_count_all_results', FALSE);
        $query = $this->db->get();
        $result = $query->row();
        $pengunjunghariini = isset($result->numrows) ? $result->numrows : 0;

        // Hitung total hits
        $this->db->select_sum('hits');
        $dbpengunjung = $this->db->get('visitors')->row();
        $totalpengunjung = isset($dbpengunjung->hits) ? $dbpengunjung->hits : 0;

        // Hitung pengunjung online
        $this->db->where('online >', $bataswaktu);
        $pengunjungonline = $this->db->count_all_results('visitors'); // Menghitung jumlah pengunjung online

        // Menyimpan data atau menampilkan hasil
        $data = array(
            'pengunjunghariini' => $pengunjunghariini,
            'totalpengunjung' => $totalpengunjung,
            'pengunjungonline' => $pengunjungonline
        );


        // $pengunjunghariini  = $this->db->query("SELECT * FROM visitors WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung

        // $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitors")->row();

        // $totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung

        // $bataswaktu = time() - 300;

        // $pengunjungonline  = $this->db->query("SELECT * FROM visitors WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online


        // $data['pengunjunghariini'] = $pengunjunghariini;
        // $data['totalpengunjung'] = $totalpengunjung;
        // $data['pengunjungonline'] = $pengunjungonline;

        $data['title'] = "Home : SiJadwalTa";

        $this->load->view('depan/head', $data);
        $this->load->view('depan/header', $data);
        $this->load->view('home', $data);
        $this->load->view('depan/footer', $data);
    }
}

/* End of file Home.php */

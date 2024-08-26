<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_khusus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kelas');
        $this->load->model('m_jadwal');
        $this->load->model('m_khusus');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Jadwal Khusus : SiJadwalTa";

        // $jadwal_khususku = $this->m_khusus->getAllDataNew();
        // $groupedData = [];
        // foreach ($jadwal_khususku as $item) {
        //     $key = $item['hari'] . '-' . $item['keterangan'];
        //     if (!isset($groupedData[$key])) {
        //         $groupedData[$key] = [
        //             'hari' => $item['hari'],
        //             'keterangan' => $item['keterangan'],
        //             'data' => []
        //         ];
        //     }
        //     $groupedData[$key]['data'][] = $item;
        // }

        $data = [
            'title' => "Jadwal Khusus : SiJadwalTa",
            'jadwal_khusus' => $this->m_khusus->getAllData(),
            'jadwal_khususku' => $this->m_khusus->getAllDataNew(),
            // 'jadwal_khususkuu' => $groupedData,
            'dataKelas' => $this->m_kelas->getAllData(),
            'jadwal' => $this->m_jadwal->getAllData(),
        ];

        // $kelasData = [];
        // foreach ($data['dataKelas'] as $kelas) {
        //     $kelasData[$kelas['hari']][] = $kelas['kelas'];
        // }

        // $data['kelasData'] = $kelasData;

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/jadwal_khusus', $data);
        $this->load->view('template/footer', $data);
    }


    public function views()
    {
        // $data['title'] = "Jadwal Khusus : SiJadwalTa";
        // $this->load->database();
        $data = [
            'title' => "Jadwal Khusus : SiJadwalTa",
            'jadwal_khusus' => $this->m_khusus->getAllData(),
            'dataKelas' => $this->m_kelas->getAllData(),
            'jadwal' => $this->m_jadwal->getAllData(),
        ];


        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/jadwal_khusus_cop', $data);
        $this->load->view('template/footer', $data);
    }

    // public function act_add()
    // {
    //     $this->m_khusus->tambah_data();
    //     $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
    //     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //     <h4><i class="icon fa fa-check"></i> Sukses</h4>
    //     Data jadwal khusus berhasil disimpan!
    //     </div>');
    //     redirect(base_url('jadwal-khusus'));
    // }

    public function act_add()
    {
        $hari = $this->input->post('hari');
        $kelas = $this->input->post('kelas');
        $keterangan = $this->input->post('keterangan');
        $sesi = $this->input->post('sesi');
        $durasi = $this->input->post('durasi');

        // Flag untuk mendeteksi jika kombinasi hari dan sesi sudah ada
        $exists = false;

        foreach ($hari as $h) {
            foreach ($kelas as $k) {
                // Cek apakah kombinasi hari dan sesi sudah ada di database
                $this->db->where('hari', $h);
                $this->db->where('sesi', $sesi);
                $existing = $this->db->get('jadwal_khusus')->row_array();

                if ($existing) {
                    $exists = true;
                    break; // Hentikan pengecekan jika ditemukan
                }
            }
            if ($exists) {
                break; // Hentikan pengecekan jika ditemukan
            }
        }

        if ($exists) {
            // Kirimkan pesan peringatan jika kombinasi hari dan sesi sudah ada
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Gagal</h4>
            Kombinasi hari dan sesi sudah ada. Silakan pilih hari dan sesi yang berbeda.
            </div>');

            redirect(base_url('jadwal-khusus'));
            // Redirect setelah menampilkan pesan
            return;
        } else {
            // Tambahkan data jika kombinasi hari dan sesi belum ada
            foreach ($hari as $h) {
                foreach ($kelas as $k) {
                    $data = array(
                        'hari' => $h,
                        'kelas' => $k,
                        'keterangan' => $keterangan,
                        'sesi' => $sesi,
                        'durasi' => $durasi
                    );
                    $this->db->insert('jadwal_khusus', $data);
                }
            }

            // Kirimkan pesan sukses
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses</h4>
            Data jadwal khusus berhasil ditambahkan!
            </div>');

            redirect(base_url('jadwal-khusus'));
        }


        // Redirect setelah menambahkan data
    }



    public function act_update()
    {
        $hari = $this->input->post('hari');
        $keterangan = $this->input->post('keterangan');
        $sesi = $this->input->post('sesi');
        $durasi = $this->input->post('durasi');
        $kelas = $this->input->post('kelas'); // Ini adalah array

        // Hapus data lama yang sesuai dengan hari dan keterangan yang sama
        $this->db->where('hari', $hari);
        $this->db->where('keterangan', $keterangan);
        $this->db->delete('jadwal_khusus');

        // Tambahkan data yang baru
        foreach ($kelas as $k) {
            $data = array(
                'hari' => $hari,
                'kelas' => $k,
                'keterangan' => $keterangan,
                'sesi' => $sesi,
                'durasi' => $durasi
            );
            $this->db->insert('jadwal_khusus', $data);
        }

        // Set flash data untuk pemberitahuan
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses</h4>
            Data jadwal khusus berhasil diupdate!
            </div>');

        // Redirect setelah update data
        redirect(base_url('jadwal-khusus'));
    }

    public function delete()
    {
        $hari = $this->input->post('hari');
        $keterangan = $this->input->post('keterangan');
        $sesi = $this->input->post('sesi');

        $this->db->where('hari', $hari);
        $this->db->where('keterangan', $keterangan);
        $this->db->where('sesi', $sesi);
        $this->db->delete('jadwal_khusus');

        // Kembalikan hasil penghapusan
        if ($this->db->affected_rows() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Tidak ada data yang dihapus']);
        }
    }
}

/* End of file Jadwal_khusus.php */

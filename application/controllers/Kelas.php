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

        // $data['kelas'] = $this->m_kelas->tampil_kelas();
        // $data['kelasedit'] = $this->m_kelas->get_kelas_by_id();
        $data['ruang'] = $this->m_kelas->ruang();

        $id_kelas = $this->input->get('id_kelas');

        // Ambil semua data kelas
        $data['kelas'] = $this->m_kelas->tampil_kelas();

        // Jika id_kelas ada, ambil data kelas untuk edit
        if ($id_kelas) {
            $data['kelasedit'] = $this->m_kelas->get_kelas_by_id($id_kelas);
        } else {
            $data['kelasedit'] = null;
        }

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
        // Ambil data dari POST
        $id_kelas = $this->input->post('id_kelas');
        $kelas = $this->input->post('kelas');
        $urutan_kelas = $this->input->post('urutan_kelas');
        $id_ruang = $this->input->post('id_ruang');

        // Ambil data lama dari database
        $this->db->where('id_kelas', $id_kelas);
        $old_data = $this->db->get('kelasku')->row();

        // Cek jika id_ruang yang diupdate sama dengan id_ruang di kelas lain
        if ($id_ruang != $old_data->id_ruang) {
            $this->db->where('id_ruang', $id_ruang);
            $this->db->where('id_kelas !=', $id_kelas);
            $existing_class = $this->db->get('kelasku')->row();

            if ($existing_class) {
                // Jika id_ruang sudah digunakan di kelas lain, tampilkan alert danger
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Gagal</h4>
                Ruangan telah digunakan pada kelas lain. Silahkan hapus terlebih dahulu atau pilih ruangan lain.
                </div>');
                redirect(base_url('kelas'));
                return;
            }
        }

        // Siapkan data baru
        $data = array(
            'kelas' => $kelas,
            'urutan_kelas' => $urutan_kelas,
            'id_ruang' => $id_ruang,
        );

        // Bandingkan data lama dengan data baru
        $has_changes = false;
        if ($old_data->kelas != $kelas || $old_data->urutan_kelas != $urutan_kelas || $old_data->id_ruang != $id_ruang) {
            $has_changes = true;
        }

        // Jika ada perubahan, update data
        if ($has_changes) {
            $this->db->where('id_kelas', $id_kelas);
            $this->db->update('kelasku', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Update</h4>
            Data kelas berhasil terupdate!
            </div>');
        } else {
            // Jika tidak ada perubahan, set pesan warning
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Perhatian</h4>
            Tidak ada data yang diperbarui!
            </div>');
        }

        // Redirect setelah proses
        redirect(base_url('kelas'));
    }


    public function delete_kelas($id_kelas)
    {
        // Cek apakah id_kelas digunakan oleh guru pengampu
        $this->db->select('id_kelas, kode_mapel');
        $this->db->from('guru_pengampu');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Jika ada data di tabel guru_pengampu yang berelasi dengan id_kelas
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Gagal Hapus</h4>
            Data tidak dapat dihapus karena kelas telah ada mapel dan guru pengampunya. Silahkan lakukan edit saja.
            </div>');
            redirect(base_url('kelas'));
        } else {
            // Hapus data dari tabel mapelku dan tabel terkait lainnya
            $this->db->where('id_kelas', $id_kelas);
            $this->db->delete('kelasku');

            // Hapus data dari tabel terkait lainnya jika ada
            // $this->db->where('kode_mapel', $kode_mapel);
            // $this->db->delete('kelasku'); // Misalnya, jika ada tabel kelas terkait

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses</h4>
            Data kelas berhasil dihapus!
            </div>');
            redirect(base_url('kelas'));
        }
    }
}

/* End of file Ruangan.php */

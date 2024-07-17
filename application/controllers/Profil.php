<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
        $data['title'] = "Profil : SiJadwalTa";

        if (
            $this->session->userdata('hak_akses') == '1'
        ) {
            $data['title'] = "Profil : SiJadwalTa";

            if (isset($_POST['cmdGantiKataSandi'])) {
                $id_user = $this->input->post('id_user');
                $password = $this->input->post('txtKataSandiBaru');

                $data = array(
                    'id_user' => $id_user,
                    'password' => $password,
                );

                $where = array(
                    'id_user' => $id_user,
                );

                $this->db->update('users', $data, $where);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Update</h4>
                Password berhasil diperbaharui!
                </div>');
                redirect(base_url('profil'));
            }

            // $this->load->view('template/head', $data);
            // $this->load->view('template/header', $data);
            // $this->load->view('template/sidebar', $data);
            // $this->load->view('admin/profil', $data);
            // $this->load->view('template/footer', $data);
        }


        if (
            $this->session->userdata('hak_akses') == '2'
        ) {
            $data['title'] = "Profil : SiJadwalTa";

            if (isset($_POST['cmdGantiKataSandi'])) {
                $id_user = $this->input->post('id_user');
                $password = $this->input->post('txtKataSandiBaru');

                $data = array(
                    'id_user' => $id_user,
                    'password' => $password,
                );

                $where = array(
                    'id_user' => $id_user,
                );

                $this->db->update('users', $data, $where);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Update</h4>
                Password berhasil diperbaharui!
                </div>');
                redirect(base_url('profil'));
            }

            // $this->load->view('template/head', $data);
            // $this->load->view('template/header', $data);
            // $this->load->view('template/sidebar', $data);
            // $this->load->view('admin/profil', $data);
            // $this->load->view('template/footer', $data);
        }

        if (
            $this->session->userdata('hak_akses') == '3'
        ) {
            $data['title'] = "Profil : SiJadwalTa";

            if (isset($_POST['cmdGantiKataSandi'])) {
                $id_guru = $this->input->post('id_guru');
                $password = $this->input->post('textPasswordku');

                $data = array(
                    'id_guru' => $id_guru,
                    'password' => $password,
                );

                $where = array(
                    'id_guru' => $id_guru,
                );

                $this->db->update('guru', $data, $where);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Update</h4>
                Password berhasil diperbaharui!
                </div>');
                redirect(base_url('profil'));
            }

            // $this->load->view('template/head', $data);
            // $this->load->view('template/header', $data);
            // $this->load->view('template/sidebar', $data);
            // $this->load->view('admin/profil', $data);
            // $this->load->view('template/footer', $data);
        }

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/profil', $data);
        $this->load->view('template/footer', $data);
    }


    public function udpate_profil()
    {
        if (
            $this->session->userdata('hak_akses') == '1'
        ) {
            $id_user = $this->input->post('id_user');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');
            $handphone = $this->input->post('handphone');
            $email = $this->input->post('email');
            $username = $this->input->post('username');

            $data = array(
                'id_user' => $id_user,
                'nik' => $nik,
                'nama' => $nama,
                'jk' => $jk,
                'alamat' => $alamat,
                'handphone' => $handphone,
                'email' => $email,
                'username' => $username,
            );

            $where = array(
                'id_user' => $id_user,
            );

            $this->db->update('users', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Update</h4>
            Data profil anda berhasil diupdate!
            </div>');
            redirect(base_url('profil'));
        }


        if (
            $this->session->userdata('hak_akses') == '2'
        ) {
            $id_user = $this->input->post('id_user');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');
            $handphone = $this->input->post('handphone');
            $email = $this->input->post('email');
            $username = $this->input->post('username');

            $data = array(
                'id_user' => $id_user,
                'nik' => $nik,
                'nama' => $nama,
                'jk' => $jk,
                'alamat' => $alamat,
                'handphone' => $handphone,
                'email' => $email,
                'username' => $username,
            );

            $where = array(
                'id_user' => $id_user,
            );

            $this->db->update('users', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Update</h4>
            Data profil anda berhasil diupdate!
            </div>');
            redirect(base_url('profil'));
        }


        if (
            $this->session->userdata('hak_akses') == '3'
        ) {
            $id_guru = $this->input->post('id_guru');
            $nip_nik = $this->input->post('nip_nik');
            $nama = $this->input->post('nama');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');
            $telp_wa = $this->input->post('telp_wa');
            $alamat_email = $this->input->post('alamat_email');
            // $username = $this->input->post('username');

            $data = array(
                'id_guru' => $id_guru,
                'nip_nik' => $nip_nik,
                'nama' => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'telp_wa' => $telp_wa,
                'alamat_email' => $alamat_email,
                // 'username' => $username,
            );

            $where = array(
                'id_guru' => $id_guru,
            );

            $this->db->update('guru', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Update</h4>
        Data profil anda berhasil diupdate!
        </div>');
            redirect(base_url('profil'));
        }
    }

    public function post()
    {

        if (isset($_POST["image"])) {

            $id_user = $this->session->userdata('id_user');

            $tempdir = "upload/img-profil/";
            if (!file_exists($tempdir))
                mkdir($tempdir);

            $data = $_POST["image"];
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);

            $imageName = $tempdir . time() . '.png';
            file_put_contents($imageName, $data);

            // $imageName = $this->upload->data();
            $imageName = time() . '.png';

            $data = array(
                'foto_pengguna' => $imageName,
            );

            $this->db->where('id_user', $id_user);
            $this->db->update('users', $data);
            redirect(base_url('profil'));
        }
    }

    public function post_akun()
    {

        if (isset($_POST["akunku"])) {

            $id_user = $this->session->userdata('id_user');

            $tempdir = "upload/img-akun/";
            if (!file_exists($tempdir))
                mkdir($tempdir);

            $data = $_POST["akunku"];
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);

            $imageName = $tempdir . time() . '.png';
            file_put_contents($imageName, $data);

            // $imageName = $this->upload->data();
            $imageName = time() . '.png';
            // $nama_tempat_wisata = $this->input->post('nama_tempat_wisata', TRUE);
            // $lokasi = $this->input->post('lokasi', TRUE);

            $data = array(
                // 'nama_tempat_wisata' => $nama_tempat_wisata,
                // 'nama_tempat_wisata' => $nama_tempat_wisata,
                // 'lokasi' => $lokasi,
                'foto_profil' => $imageName,
            );

            $this->db->where('id_user', $id_user);
            $this->db->update('users', $data);
            // $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible">
            // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            // <h4><i class="icon fa fa-check"></i> Update</h4>
            // Data profil anda berhasil diupdate!
            // </div>');
            redirect(base_url('profil'));
        }
    }
}

/* End of file Profil.php */

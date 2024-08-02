<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }


    public function index()
    {
        $data['title'] = "Login : SiJadwalTa";


        $this->load->view('login/login_new', $data);
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Cek pengguna sebagai user
        $cek_user = $this->m_login->auth_user($username, $password);

        if ($cek_user->num_rows() > 0) {
            $data = $cek_user->row_array();
            $response = array();

            if ($data['hak_akses'] == '1') {
                // Set session untuk user dengan hak akses 1
                $this->session->set_userdata('masuk', TRUE);
                $this->session->set_userdata('hak_akses', '1');
                $this->session->set_userdata('username', $data['username']);
                $this->session->set_userdata('email', $data['email']);
                $this->session->set_userdata('jk', $data['jk']);
                $this->session->set_userdata('alamat', $data['alamat']);
                $this->session->set_userdata('nik', $data['nik']);
                $this->session->set_userdata('handphone', $data['handphone']);
                $this->session->set_userdata('nama', $data['nama']);
                $this->session->set_userdata('foto_pengguna', $data['foto_pengguna']);
                $this->session->set_userdata('foto_profil', $data['foto_profil']);
                $this->session->set_userdata('id_user', $data['id_user']);
                $response = array(
                    'status' => 'success',
                    'message' => 'Sukses!<br>Login successful',
                    'redirect' => base_url('dashboard')
                );
            } elseif ($data['hak_akses'] == '2') {
                // Set session untuk user dengan hak akses 2
                $this->session->set_userdata('masuk', TRUE);
                $this->session->set_userdata('hak_akses', '2');
                $this->session->set_userdata('username', $data['username']);
                $this->session->set_userdata('email', $data['email']);
                $this->session->set_userdata('jk', $data['jk']);
                $this->session->set_userdata('alamat', $data['alamat']);
                $this->session->set_userdata('nik', $data['nik']);
                $this->session->set_userdata('handphone', $data['handphone']);
                $this->session->set_userdata('nama', $data['nama']);
                $this->session->set_userdata('foto_pengguna', $data['foto_pengguna']);
                $this->session->set_userdata('foto_profil', $data['foto_profil']);
                $this->session->set_userdata('id_user', $data['id_user']);
                $response = array(
                    'status' => 'success',
                    'message' => 'Sukses!<br>Login successful',
                    'redirect' => base_url('dashboard')
                );
            }
        } else {
            // Cek pengguna sebagai guru
            $cek_user = $this->m_login->auth_guru($username, $password);
            if ($cek_user->num_rows() > 0) {
                $data = $cek_user->row_array();
                $this->session->set_userdata('masuk', TRUE);
                $this->session->set_userdata('hak_akses', '3');
                $this->session->set_userdata('id_guru', $data['id_guru']);
                $this->session->set_userdata('alamat_email', $data['alamat_email']);
                $this->session->set_userdata('nip_nik', $data['nip_nik']);
                $this->session->set_userdata('nama', $data['nama']);
                $this->session->set_userdata('alamat', $data['alamat']);
                $this->session->set_userdata('jenis_kelamin', $data['jenis_kelamin']);
                $this->session->set_userdata('telp_wa', $data['telp_wa']);
                $response = array(
                    'status' => 'success',
                    'message' => 'Sukses!<br>Login successful',
                    'redirect' => base_url('dashboard')
                );
            } else {
                // Jika login gagal
                $response = array(
                    'status' => 'error',
                    'message' => 'Upps!<br>Username or password incorrect'
                );
            }
        }

        // Kirim respons JSON
        echo json_encode($response);
    }
}

/* End of file Login.php */

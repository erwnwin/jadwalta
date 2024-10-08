<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_guru');
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect(base_url('login'));
        }
    }


    public function index()
    {
        $data['title'] = "Guru : SiJadwalTa";

        $data['guru'] = $this->m_guru->getAll()->result();

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('template/footer', $data);
    }


    public function add_act()
    {
        // Ambil data dari input
        $nama = $this->input->post('nama');
        $nip_nik = $this->input->post('nip_nik');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $telp_wa = $this->input->post('telp_wa');
        $alamat_email = $this->input->post('alamat_email');
        $password = $this->input->post('password');
        $warna_guru = $this->input->post('warna_guru');

        // Cek apakah NIP/NIK, Email, atau Telepon sudah ada di database
        $this->db->where('nip_nik', $nip_nik);
        $query_nip_nik = $this->db->get('guru');

        $this->db->where('alamat_email', $alamat_email);
        $query_email = $this->db->get('guru');

        $this->db->where('telp_wa', '62' . $telp_wa);
        $query_telp_wa = $this->db->get('guru');

        if ($query_nip_nik->num_rows() > 0 || $query_email->num_rows() > 0 || $query_telp_wa->num_rows() > 0) {
            // Jika ada data yang sudah ada, set pesan error
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Gagal</h4>
            Data sudah ada! Silakan periksa NIP/NIK, Email, atau Telepon Anda.
        </div>');
            redirect(base_url('guru'));
            return;
        } else {

            // Jika tidak ada data yang sama, lanjutkan dengan penyimpanan
            $data = array(
                'nama' => $nama,
                'nip_nik' => $nip_nik,
                'alamat' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'telp_wa' => '62' . $telp_wa,
                'alamat_email' => $alamat_email,
                'password' => $password,
                'warna_guru' => $warna_guru,
            );

            $this->db->insert('guru', $data);

            // Kirim pesan WhatsApp
            $token = "R1bqBzS9scy-5+uYzRHq";
            $target = '62' . $telp_wa;

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => http_build_query(array(
                    'target' => $target,
                    'message' => '*Hai, Bapak/Ibu ' . $nama . '*

*Salam Sejahtera, Bapak/Ibu Guru SMA Kristen*

Data anda berhasil ditambahkan ke database sistem. Bapak/Ibu Guru dapat login ke aplikasi e-Schedule menggunakan user login di bawah ini:

*Username/alamat email :* ' . $alamat_email . '
*Password :* ' . $password . '

Data akun login anda dapat anda update melalui menu profil ketika Bapak/Ibu login nantinya. Terima kasih.

Pesan ini dikirim secara otomatis oleh sistem',
                )),
                CURLOPT_HTTPHEADER => array(
                    "Authorization: $token"
                ),
            ));

            $response = curl_exec($curl);

            if (curl_errno($curl)) {
                echo 'Error:' . curl_error($curl);
            }

            curl_close($curl);

            // Set pesan sukses
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses</h4>
                Data guru berhasil disimpan!
            </div>');

            redirect(base_url('guru'));
        }
    }


    // public function add_act()
    // {
    //     $nama = $this->input->post('nama');
    //     $nip_nik = $this->input->post('nip_nik');
    //     $alamat = $this->input->post('alamat');
    //     $jenis_kelamin = $this->input->post('jenis_kelamin');
    //     $telp_wa = $this->input->post('telp_wa');
    //     $alamat_email = $this->input->post('alamat_email');
    //     $password = $this->input->post('password');
    //     $warna_guru = $this->input->post('warna_guru');

    //     if (empty($nama) || empty($nip_nik) || empty($alamat) || empty($jenis_kelamin) || empty($telp_wa) || empty($alamat_email) || empty($password)) {
    //         // Handle the error (e.g., set an error message and redirect)
    //         return;
    //     }

    //     $data = array(
    //         'nama' => $nama,
    //         'nip_nik' => $nip_nik,
    //         'alamat' => $alamat,
    //         'jenis_kelamin' => $jenis_kelamin,
    //         'telp_wa' => '62' . $telp_wa,
    //         'alamat_email' => $alamat_email,
    //         'password' => $password,
    //         'warna_guru' => $warna_guru,
    //     );

    //     $this->db->insert('guru', $data);

    //     $token = "R1bqBzS9scy-5+uYzRHq";
    //     $target = '62' . $telp_wa;

    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://api.fonnte.com/send',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => http_build_query(array(
    //             'target' => $target,
    //             'message' => '*Hai, Bapak/Ibu ' . $nama . '* ...'
    //         )),
    //         CURLOPT_HTTPHEADER => array(
    //             "Authorization: $token"
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     if (curl_errno($curl)) {
    //         echo 'Error:' . curl_error($curl);
    //     }

    //     curl_close($curl);

    //     $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
    // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    // <h4><i class="icon fa fa-check"></i> Sukses</h4>
    // Data guru berhasil disimpan!
    // </div>');

    //     redirect(base_url('guru'));
    // }


    //     public function add_act()
    //     {
    //         $nama = $this->input->post('nama');
    //         $nip_nik = $this->input->post('nip_nik');
    //         $alamat = $this->input->post('alamat');
    //         $jenis_kelamin = $this->input->post('jenis_kelamin');
    //         $telp_wa = $this->input->post('telp_wa');
    //         $alamat_email = $this->input->post('alamat_email');
    //         $password = $this->input->post('password');
    //         $warna_guru = $this->input->post('warna_guru');

    //         $data = array(
    //             'nama' => $nama,
    //             'nip_nik' => $nip_nik,
    //             'alamat' => $alamat,
    //             'jenis_kelamin' => $jenis_kelamin,
    //             'telp_wa' => '62' . $telp_wa,
    //             'alamat_email' => $alamat_email,
    //             'password' => $password,
    //             'warna_guru' => $warna_guru,

    //         );

    //         $this->db->insert('guru', $data);

    //         $token = "R1bqBzS9scy-5+uYzRHq";
    //         $target = '62' . $telp_wa;

    //         // $token = "r5-2#s!RR_b6umzdW4pm";
    //         // $target = "6282194460105";


    //         $curl = curl_init();

    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => 'https://api.fonnte.com/send',
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => '',
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 0,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => 'POST',
    //             CURLOPT_POSTFIELDS => array(
    //                 'target' => $target,
    //                 'message' => '*Hai, Bapak/Ibu ' . $this->input->post('nama') . '*

    // *Salam Sejahtera, Bapak/Ibu Guru SD*

    // Data anda berhasil ditambahkan ke database sistem. Bapak/Ibu Guru dapat login ke sistem Penjadwalan Mata Pelajaran menggunakan user login di bawah ini:

    // *Username/alamat email :* ' . $this->input->post('alamat_email') . '
    // *Password :* ' . $this->input->post('password') . '

    // Data akun login anda dapat anda update melalui menu profil ketika Bapak/Ibu login nantinya. Terima kasih.

    // Pesan ini dikirim secara otomatis oleh sistem',
    //             ),
    //             CURLOPT_HTTPHEADER => array(
    //                 "Authorization: $token" //change TOKEN to your actual token
    //             ),
    //         ));

    //         $response = curl_exec($curl);

    //         curl_close($curl);
    //         echo $response;

    //         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
    //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //         <h4><i class="icon fa fa-check"></i> Sukses</h4>
    //         Data guru berhasil disimpan!
    //         </div>');

    //         redirect(base_url('guru'));
    //     }

    public function edit_act()
    {
        $id_guru = $this->input->post('id_guru');
        $nama = $this->input->post('nama');
        $nip_nik = $this->input->post('nip_nik');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $telp_wa = $this->input->post('telp_wa');
        $alamat_email = $this->input->post('alamat_email');
        $password = $this->input->post('password');
        $warna_guru = $this->input->post('warna_guru');

        $data = array(
            'id_guru' => $id_guru,
            'nama' => $nama,
            'nip_nik' => $nip_nik,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'telp_wa' =>  $telp_wa,
            'alamat_email' => $alamat_email,
            'password' => $password,
            'warna_guru' => $warna_guru,


        );

        $where = array(
            'id_guru' => $id_guru,
        );

        $this->db->update('guru', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Update</h4>
        Data guru berhasil terupdate!
        </div>');
        redirect(base_url('guru'));
    }

    public function hapus_act($id)
    {
        $this->m_guru->hapus($id);
        // $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
        // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        // <h4><i class="icon fa fa-ban"></i> Dihapus</h4>
        // Data guru berhasil dihapus!
        // </div>');
        redirect(base_url('guru'));
    }
}

/* End of file Guru.php */

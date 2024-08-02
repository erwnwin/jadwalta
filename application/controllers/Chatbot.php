<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chatbot extends CI_Controller
{

    public function receive_message()
    {
        header('Content-Type: application/json; charset=utf-8');

        // Get raw POST data
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        // Check if data is valid
        if (!$data) {
            $this->output->set_status_header(400);
            echo json_encode(['error' => 'Invalid JSON']);
            return;
        }

        // Extract data from request
        $device = $data['device'] ?? '';
        $sender = $data['sender'] ?? '';
        $message = $data['message'] ?? '';
        $name = $data['name'] ?? '';

        // Initialize variables for optional data
        $url = $data['url'] ?? '';
        $filename = $data['filename'] ?? '';

        // Check if sender exists in the database
        $this->db->where('telp_wa', $sender);
        $query = $this->db->get('guru');
        $row = $query->row_array();

        $reply = [];

        if ($message == "#jadwalsaya") {
            if ($row) {
                $telp_wa1 = $row['telp_wa'];
                $nama1 = $row['nama'];

                // Query jadwal
                $this->db->select('penjadwalan.*');
                $this->db->from('penjadwalan');
                $this->db->join('guru', 'guru.id_guru = penjadwalan.id_guru');
                $this->db->where('guru.telp_wa', $telp_wa1);
                $query_jadwal = $this->db->get();
                $jadwals = $query_jadwal->result_array();

                if ($jadwals) {
                    $jadwal_list = "";
                    foreach ($jadwals as $jadwal) {
                        $jadwal_list .= "Mata Pelajaran: " . $jadwal['mata_pelajaran'] . "\n";
                        $jadwal_list .= "Hari: " . $jadwal['hari'] . "\n";
                        $jadwal_list .= "Jam: " . $jadwal['jam'] . "\n\n";
                    }

                    $reply = [
                        "message" => "Jadwal anda adalah:\n\n" . $jadwal_list .
                            "Pesan ini dikirim secara otomatis oleh sistem",
                    ];
                } else {
                    $reply = [
                        "message" => "Tidak ada jadwal yang ditemukan untuk Anda.\n\nPesan ini dikirim secara otomatis oleh sistem",
                    ];
                }
            } else {
                $reply = [
                    "message" => "Data guru tidak ditemukan.\n\nPesan ini dikirim secara otomatis oleh sistem",
                ];
            }
        } elseif ($message == "#akunsaya") {
            if ($row) {
                $alamat_email1 = $row['alamat_email'];

                $reply = [
                    "message" => "*Hai " . $row['nama'] . "*\n\n" .
                        "Akun Login untuk Sistem Informasi Penjadwalan Mata Pelajaran (SiJadwalTa) adalah\n\n" .
                        "*Username/alamat email* = " . $alamat_email1 . "\n" .
                        "*Password* = r#h#si#\n\n" .
                        "Bapak/Ibu dapat mengubah detail akun login di menu Profil. Jika Bapak/Ibu Guru *Lupa Password* silahkan menghubungi admin SiJadwalTa. Terima Kasih\n\n" .
                        "Pesan ini dikirim secara otomatis oleh sistem",
                ];
            } else {
                $reply = [
                    "message" => "Maaf tidak ditemukan data terkait.\n\nPesan ini dikirim secara otomatis oleh sistem",
                ];
            }
        } elseif ($message == "#nomorhpguru") {
            $reply = [
                "message" => "Nomor HP Guru dapat dilihat pada halaman utama SiJadwalTa pada menu Lainnya >> No. HP/WA Guru\n\n" .
                    "Pesan ini dikirim secara otomatis oleh sistem",
            ];
        } else {
            $nama1 = $row['nama'];
            $reply = [
                "message" => "Mohon Maaf, " . $nama1 . "\n\n" .
                    "BOT ini hanya membalas pesan anda dengan kata kunci:\n\n" .
                    "*#jadwalsaya* = untuk mengetahui jadwal mengajar guru\n" .
                    "*#akunsaya* = untuk mengetahui akun login guru\n" .
                    "*#nomorhpguru* = untuk mengetahui nomor hp/wa guru\n\n" .
                    "Pesan ini dikirim secara otomatis oleh sistem",
            ];
        }

        $this->sendFonnte($sender, $reply);
    }

    private function sendFonnte($target, $data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.fonnte.com/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $data['message'],
                'url' => $data['url'] ?? '',
                'filename' => $data['filename'] ?? '',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: R1bqBzS9scy-5+uYzRHq"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}

/* End of file Chatbot.php */

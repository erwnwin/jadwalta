<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Webclone extends CI_Controller
{

    public function index()
    {
        // Verifikasi dan proses payload dari webhook
        $payload = file_get_contents('php://input');
        $data = json_decode($payload, true);

        // Contoh: memeriksa data dan memicu aksi seperti pull dan deploy
        if (isset($data['ref']) && $data['ref'] === 'refs/heads/main') {
            $this->deploy();
        }

        // Kirimkan respons ke platform Git
        echo json_encode(['status' => 'success']);
    }

    private function deploy()
    {
        // Jalankan perintah untuk pull perubahan dari repositori Git
        $output = shell_exec('cd /home/hvsteofj/public_html/jadwalta.winartcode.my.id && git pull origin main');
        // Log atau proses output jika diperlukan
    }
}

/* End of file Webclone.php */

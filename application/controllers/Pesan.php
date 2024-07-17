<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{

    public function index()
    {

        $data['title'] = "Pesan : SiJadwalTa";

        $this->load->view('template/head', $data);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/pesan', $data);
        $this->load->view('template/footer', $data);
    }


    public function sendmsg()
    {
        $userkey = '3f794e7514a2';
        $passkey = '7a9346b30aa488bb3ce735dc';
        $telepon = $this->input->post('mobile');
        $message = $this->input->post('message');;
        $url = 'https://console.zenziva.net/reguler/api/sendsms/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }

    public function smskirim($to, $msg)
    {

        $to = "082194460105";
        $msg = "Coba kirim";

        //init SMS gateway, look at android SMS gateway
        $idmesin = "472";
        $pin = "041841";

        $msg = str_replace(" ", "%20", $msg);

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$to&text=$msg");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        return ($output);
    }
    // $sending=sendsms("082137980096","hello guest");

   
}

/* End of file Pesan.php */

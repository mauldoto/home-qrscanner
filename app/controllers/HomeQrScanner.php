<?php

class HomeQrScanner extends Controller
{
    public function index()
    {
        $this->view('templates/header');
        $this->view('qrscanner/index');
        $this->view('templates/footer');
    }

    public function input()
    {
        // $data = json_decode($_POST['submited_data'], true);
        // if (count($data) < 4) {
        //     Flasher::setMessage('failed', 'Semua kategori belum diberi penilaian', 'danger');
        //     header('location: ' . BASEURL . '/');
        //     exit;
        // }

        // if ($this->model('SurveyTamuModel')->saveData($data) <= 0) {
        //     Flasher::setMessage('Failed,', 'Check your input', 'danger');
        //     header('location: ' . BASEURL . '/tamu');
        //     exit;
        // }

        // Flasher::setMessage('Successfully', 'Created', 'success');
        // header('location: ' . BASEURL . '/tamu');
        // exit;
    }

    public function report()
    {
        // var_dump($_SERVER['REQUEST_URI']);
        $dataFull = explode('?', $_SERVER['REQUEST_URI']);
        $shorterData = explode('&', $dataFull[1]);

        $results = $this->model('HomeQrScannerModel')->getPenghuniRumah($shorterData);
        foreach ($results as $key => $detail) {
            $results[$key]['details'] = $this->model('HomeQrScannerModel')->getDetailPenghuni([$detail['KODERUMAH'], $detail['INDUK_NIK']]);
        }

        echo json_encode(["data" => $results]);
    }
}

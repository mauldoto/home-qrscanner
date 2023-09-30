<?php

class HomeQrScanner extends Controller
{
    public function index()
    {
        $this->view('templates/header');
        $this->view('qrscanner/index');
        $this->view('templates/footer');
    }

    public function report()
    {
        // var_dump($_SERVER['REQUEST_URI']);
        $dataFull = explode('?', $_SERVER['REQUEST_URI']);
        $shorterData = explode('&', $dataFull[1]);

        $results = $this->model('HomeQrScannerModel')->getPenghuniRumah($shorterData);

        foreach ($results as $key => $detail) {
            $results[$key]['details'] = $this->model('HomeQrScannerModel')->getDetailPenghuni([$detail['KODERUMAH'], $detail['INDUK_NIK']]);

            // var_dump($detail['KODERUMAH']);
            // $path = $detail['FOTO1'];
            // $type = pathinfo($path, PATHINFO_EXTENSION);
            // $data = file_get_contents($path);
            // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            // $results[$key]['FOTO'] = $base64;
        }

        echo json_encode(["data" => $results]);
    }
}

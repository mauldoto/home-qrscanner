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
            $foto = explode('\\', $results[$key]['FOTO1']);

            $results[$key]['FOTO'] = ASSETS_URL . '/' . end($foto);
        }

        echo json_encode(["data" => $results]);
    }
}

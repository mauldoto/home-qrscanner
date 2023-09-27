<?php

class Tamu extends Controller
{
    public function index()
    {
        $this->view('templates/header_tamu');
        $this->view('tamu/index_v2');
        $this->view('templates/footer_tamu');
    }

    public function input()
    {
        $data = json_decode($_POST['submited_data'], true);
        if (count($data) < 4) {
            Flasher::setMessage('failed', 'Semua kategori belum diberi penilaian', 'danger');
            header('location: ' . BASEURL . '/tamu');
            exit;
        }

        if ($this->model('SurveyTamuModel')->saveData($data) <= 0) {
            Flasher::setMessage('Failed,', 'Check your input', 'danger');
            header('location: ' . BASEURL . '/tamu');
            exit;
        }

        Flasher::setMessage('Successfully', 'Created', 'success');
        header('location: ' . BASEURL . '/tamu');
        exit;
    }

    public function report()
    {
        $master = [];

        $date = explode('=', $_SERVER['REQUEST_URI']);

        $data = $this->model('SurveyTamuModel')->getDataByDateRange($date);
        foreach ($data as $key => $kepuasan) {
            foreach ($kepuasan as $key2 => $detail) {
                $kategori = explode("_", $key2);

                if (isset($master[$kategori[0]])) {
                    if (isset($master[$kategori[0]][$kategori[1]])) {
                        $master[$kategori[0]][$kategori[1]] += intval($detail);
                    } else {
                        $master[$kategori[0]][$kategori[1]] = intval($detail);
                    }
                } else {
                    $master[$kategori[0]] = [];
                    $master[$kategori[0]]["name"] = $kategori[0];
                }
            }
        }

        echo json_encode(["data" => $master]);
    }
}

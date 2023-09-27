<?php

class Angket extends Controller
{
    public function index()
    {
        // var_dump($this->model('AngketModel')->getArrayData());
        $data['title'] = 'HR Angket - isi angket';
        $data['angket'] = $this->model('AngketModel')->getArrayData();
        $this->view('templates/header_new', $data);
        $this->view('angket/index', $data);
        $this->view('templates/footer_new');
    }

    public function input()
    {
        $this->checkEmpCode($_POST['nik']);

        $data['angket'] = $this->model('AngketModel')->getAllData();
        foreach ($data['angket'] as $key => $angket) {
            $_POSTMOD['nik'] = $_POST['nik'];
            $_POSTMOD['no'] = $angket['NO'];
            $_POSTMOD['jawaban'] = isset($_POST['angket_' . $angket['NO']]) ? $_POST['angket_' . $angket['NO']] : '';
            $_POSTMOD['alasan'] = isset($_POST['alasan_angket_' . $angket['NO'] . $_POSTMOD['jawaban']]) ? $_POST['alasan_angket_' . $angket['NO'] . $_POSTMOD['jawaban']] : '';
            if ($this->model('AngketModel')->saveData($_POSTMOD) <= 0) {
                Flasher::setMessage('Failed,', 'Check your input', 'danger');
                header('location: ' . BASEURL . '/angket');
                exit;
            }
        }

        Flasher::setMessage('Successfully', 'Created', 'success');
        header('location: ' . BASEURL . '/angket');
        exit;
    }

    public function inputmultiple()
    {
        $this->checkEmpCode($_POST['nik']);

        try {
            $this->model('AngketModel')->saveDataMultipleRow($_POST);
        } catch (\Throwable $th) {
            Flasher::setMessage('Failed,', 'Check your input', 'danger');
            header('location: ' . BASEURL . '/angket');
            exit;
        }

        Flasher::setMessage('Successfully', 'Created', 'success');
        header('location: ' . BASEURL . '/angket');
        exit;
    }

    public function select2()
    {
        $search = explode('=', $_SERVER['REQUEST_URI']);
        $results = $this->model('KaryawanModel')->getSearchData($search[1]);
        echo json_encode($results);
    }

    public function detail()
    {
        $nik = explode('=', $_SERVER['REQUEST_URI']);
        $employee = $this->model('KaryawanModel')->getDetail($nik[1]);
        $jawaban = $this->model('AngketModel')->getJawaban($nik[1]);
        echo json_encode(["employee" => $employee, 'jawaban' => $jawaban]);
    }

    public function checkEmpCode($nik)
    {
        $result = $this->model('KaryawanModel')->getDetail($nik);
        if (!$result || count($result) <= 0) {
            Flasher::setMessage('Failed', 'NIK Tidak Terdaftar!!!', 'danger');
            header('location: ' . BASEURL . '/angket');
            exit;
        }

        return true;
    }
}

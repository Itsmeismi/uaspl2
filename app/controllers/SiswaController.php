<?php

class SiswaController extends Controller
{
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function index()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $url = $this->parseUrl();
            $data['uri_segment'] = $url['0'];
            $data['title'] = 'Siswa';
            $data['content'] = 'siswa/index';
            $data['siswa'] = $this->model('SiswaModel')->getSiswa();
            $this->view('layout/app', $data);
        }
    }

    public function tambah()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('SiswaModel')->tambahSiswa($_POST);
            header('Location: ' . BASEURL . 'SiswaController');
            exit;
        }
    }

    public function hapus($NISN)
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('SiswaModel')->hapusSiswa(base64_decode($NISN));
            header('Location: ' . BASEURL . 'SiswaController');
            exit;
        }
    }

    public function getUbah($NISN)
    {
        $url = $this->parseUrl();
        $data['uri_segment'] = $url['1'];
        $data['getsiswa'] = $this->model('SiswaModel')->getSiswaByNISN(base64_decode($NISN));
        $data['siswa'] = $this->model('SiswaModel')->getSiswa();
        $data['title'] = 'Siswa';
        $data['content'] = 'siswa/index';
        $this->view('layout/app', $data);
    }

    public function ubah()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $this->model('SiswaModel')->ubahSiswa($_POST);
            header('Location: ' . BASEURL . 'SiswaController');
            exit;
        }
    }
}

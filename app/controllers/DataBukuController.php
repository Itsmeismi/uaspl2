<?php

class DataBukuController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $data['title'] = 'Data Buku';
            $data['content'] = 'buku/index';
            $data['dataBuku'] = $this->model('DataBukuModel')->getDataBuku();
            $this->view('layout/app', $data);
        }
    }

    public function simpanBuku()
    {
        echo json_encode($this->model('DataBukuModel')->insertBuku($_POST));
    }
}

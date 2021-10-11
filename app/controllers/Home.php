<?php

class Home extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['is_login'])) {
            header('Location: ' . BASEURL);
        } else {
            $data['title'] = 'Dashboard';
            $data['content'] = 'home/index';
            $this->view('layout/app', $data);
        }
    }
}

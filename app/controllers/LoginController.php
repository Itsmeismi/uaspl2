<?php

class LoginController extends Controller
{

    public function index()
    {
        $this->view('auth/index');
    }

    public function login()
    {
        $USER = $this->model('UserModel')->userLogin($_POST['Username']);
        if ($USER) {
            if ($_POST['password'] == $USER['password']) {

                $_SESSION['id_users'] = $USER['id'];
                $_SESSION['name'] = $USER['name'];
                $_SESSION['email'] = $USER['email'];
                $_SESSION['is_login'] = TRUE;
                echo json_encode([
                    'status' => true,
                    'alertIcon' => 'success',
                    'alertTitle' => 'Hallo ^_^',
                    'alertText' => 'Selamat datang ' . $USER['name'],
                ]);
            } else {
                Flasher::setFlash('Password Salah', '', 'danger');
                echo json_encode([
                    'status' => false,
                    'alertIcon' => 'error',
                    'alertTitle' => 'Opps....',
                    'alertText' => 'Password yang anda masukan salah',
                ]);
            }
        } else {
            Flasher::setFlash('Username tidak tersedia', '', 'danger');
            echo json_encode([
                'status' => false,
                'alertIcon' => 'error',
                'alertTitle' => 'Opps....',
                'alertText' => 'Username tidak tersedia',
            ]);
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        echo json_encode([
            'status' => true,
            'alertIcon' => 'success',
            'alertTitle' => 'Dadahh....',
            'alertText' => 'Akun anda berhasil keluar',
        ]);
    }
}

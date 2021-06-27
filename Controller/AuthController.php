<?php

class AuthController
{
    private $model;

    public function __construct()
    {
        $this->model = new AuthModel();
    }

    /**
     * berfungsi untuk proses login berdasarkan username dan password
     */
    public function prosesLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $dataUser = $this->model->cekUser($username, $password);
        if (!empty($dataUser)) {
            $_SESSION['statusUser'] = 'logged';
            $_SESSION['user'] = $dataUser;
        } else {
            $_SESSION['statusUser'] = 'notLogged';
            $_SESSION['statusLogin'] = 'gagal';
        }
        header("location: index.php?page=utama&aksi=view");
    }

    /**
     * berfungsi untuk proses logout
     */
    public function prosesLogout()
    {
        session_destroy();
        header("location: index.php?page=utama&aksi=view");
    }
}

<?php

class AuthController
{
    private $modelAuth;
    private $modelKota;

    public function __construct()
    {
        $this->modelAuth = new AuthModel();
        $this->modelKota = new KotaModel();
    }

    /**
     * berfungsi untuk proses login berdasarkan username dan password
     */
    public function prosesLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $dataUser = $this->modelAuth->cekUser($username, $password);
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

    /**
     * berfungsi untuk menampilkan tampilan pendaftaran
     */
    public function viewDaftar()
    {
        $dataKota = $this->modelKota->getAllKota();
        extract($dataKota);
        require_once("View/daftar.php");
    }

    /**
     * berfungsi untuk menyimpan data pendaftaran ke dalam database
     */
    public function store()
    {
        $nama = $_POST['nama'];
        $tanggalLahir = $_POST['tglLahir'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $noTelp = $_POST['noTelp'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($this->modelAuth->prosesStore($nama, $tanggalLahir, $jenisKelamin, $alamat, $kota, $noTelp, $email, $username, $password)) {
            header("location: index.php?page=utama&aksi=view&pesan=Berhasil Daftar");
        } else {
            header("location: index.php?page=daftar&aksi=view&pesan=Gagal Daftar");
        }
    }
}

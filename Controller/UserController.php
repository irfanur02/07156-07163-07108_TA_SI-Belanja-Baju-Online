<?php

class UserController
{

    private $modelUser;
    private $modelTransaksi;
    private $modelKota;

    public function __construct()
    {
        $this->modelUser = new UserModel();
        $this->modelTransaksi = new TransaksiModel();
        $this->modelKota = new KotaModel();
    }

    /**
     * berfungsi untuk menampilkan tampilan profil berdasarkan id user
     */
    public function view()
    {
        $idUser = $_SESSION['user']['id_user'];
        $dataProfil = $this->modelUser->getDataUser($idUser);
        $dataKota = $this->modelKota->getAllKota();
        $jumlahKeranjangUser = $this->modelTransaksi->getJumlahKeranjangUser($idUser);
        extract($dataProfil);
        extract($dataKota);

        if (empty($jumlahKeranjangUser)) {
            $jumlahKeranjang =  0;
        } else {
            $jumlahKeranjang =  $jumlahKeranjangUser['jumlahKeranjang'];
        }
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/profil.php");
    }

    /**
     * berfungsi untuk mengupdate profil
     */
    public function update()
    {
        $idUser = $_POST['idUser'];
        $idOwnerUser = $_POST['idOwnerUser'];
        $nama = $_POST['nama'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $noTelp = $_POST['noTelp'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $this->modelUser->prosesUpdate($idUser, $idOwnerUser, $nama, $tanggalLahir, $jenisKelamin, $alamat, $kota, $noTelp, $email, $username, $password);
        header("location: index.php?page=profil&aksi=view");
    }
}

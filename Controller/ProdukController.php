<?php

class ProdukController
{
    private $modelProduk;
    private $modelTransaksi;
    private $modelFavorite;

    public function __construct()
    {
        $this->modelProduk = new ProdukModel();
        $this->modelTransaksi = new TransaksiModel();
        $this->modelFavorite = new FavoriteModel();
    }

    /**
     * berfungsi untuk menampilkan tampilan awal dari aplikasi
     */
    public function viewUser()
    {
        //? nunggu progress login
        //! $idUser = $_SESSION['user']['id'];
        $idUser = 4;
        $dataSeluruhBaju = $this->modelProduk->getSeluruhBaju();
        $dataBajuPopuler = $this->modelProduk->getBajuPopuler(5);
        $dataKeranjangUser = $this->modelTransaksi->getKeranjang($idUser);
        $jumlahKeranjangUser = $this->modelTransaksi->getJumlahKeranjangUser($idUser);
        $dataBajuFavorite = $this->modelFavorite->getBajuFavorite($idUser);
        extract($dataSeluruhBaju);
        extract($dataBajuPopuler);
        extract($dataKeranjangUser);
        extract($dataBajuFavorite);
        if (empty($jumlahKeranjangUser)) {
            $jumlahKeranjang =  0;
        } else {
            $jumlahKeranjang =  $jumlahKeranjangUser['jumlahKeranjang'];
        }
        $_SESSION['statusUser'] = 'logged'; // hanya percobaan
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/index.php");
    }
}

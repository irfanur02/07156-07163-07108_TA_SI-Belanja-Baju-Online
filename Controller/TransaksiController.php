<?php

class TransaksiController
{
    private $model;

    public function __construct()
    {
        $this->model = new TransaksiModel();
    }

    /**
     * berfungsi untuk mendapatkan histori transaksi pada user
     */
    public function getHistoriTransaksi($statusPembelian)
    {
        //? nunggu progress login
        //! $id_user = $_SESSION['user']['id'];
        $dataTransaksi = $this->model->getDataTransaksi(3, $statusPembelian);
        $detailDataTransaksi = $this->model->getDetailDataTransaksi(3, $statusPembelian);
        extract($dataTransaksi);
        extract($detailDataTransaksi);
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/histori_transaksi.php");
    }

    /**
     * berfungsi untuk mendapatkan transaksi pembelian statusnya dalam proses
     */
    public function getPembelianTerproses($statusPembelian)
    {
        //? nunggu progress login
        //! $id_user = $_SESSION['user']['id'];
        $dataTransaksi = $this->model->getDataTransaksi(2, $statusPembelian);
        $detailDataTransaksi = $this->model->getDetailDataTransaksi(2, $statusPembelian);
        extract($dataTransaksi);
        extract($detailDataTransaksi);
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        $judul = "Dalam Proses";
        require_once("View/pembelian.php");
    }

    /**
     * berfungsi untuk mendapatkan transaksi pembelian statusnya dalam pengiriman
     */
    public function getPembelianTerkirim($statusPembelian)
    {
        //? nunggu progress login
        //! $id_user = $_SESSION['user']['id'];
        $dataTransaksi = $this->model->getDataTransaksi(3, $statusPembelian);
        $detailDataTransaksi = $this->model->getDetailDataTransaksi(3, $statusPembelian);
        extract($dataTransaksi);
        extract($detailDataTransaksi);
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        $judul = "Dalam Pengiriman";
        require_once("View/pembelian.php");
    }

    /**
     * berfungsi untuk mengupdate pembelian yang barangnya telah diterima
     */
    public function updatePembelian()
    {
        $idTransaksi = $_GET['id'];
        $this->model->prosesUpdatePembelian($idTransaksi);
        header("location: index.php?page=pembelian&aksi=keadaanTerkirim");
    }

    /**
     * berfungsi untuk mendapatkan produk yang telah dimasukkan ke dalam keranjang
     */
    public function getKeranjang()
    {
        //? nunggu progress login
        //! $id_user = $_SESSION['user']['id'];
        $dataKeranjang = $this->model->getDataKeranjang(1);
        extract($dataKeranjang);
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/keranjang.php");
    }

    /**
     * berfungsi untuk mengahapus produk yang ada dalam keranjang
     */
    public function delete()
    {
        $idBaju = $_GET['idBaju'];
        $idTransaksi = $_GET['idTransaksi'];
        $this->model->prosesDeleteKeranjang($idTransaksi, $idBaju);
        header("location: index.php?page=keranjang&aksi=view");
    }
}

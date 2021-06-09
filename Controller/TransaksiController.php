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
    public function getHistoriTransaksi()
    {
        //? nunggu progress login
        //! $id_user = $_SESSION['user']['id'];
        $dataTransaksi = $this->model->getDataTransaksi(3);
        $detailDataTransaksi = $this->model->getDetailDataTransaksi(3);
        extract($dataTransaksi);
        extract($detailDataTransaksi);
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/histori_transaksi.php");
    }
}

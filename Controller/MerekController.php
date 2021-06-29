<?php

class MerekController
{

    private $modelMerek;
    private $modelTransaksi;

    public function __construct()
    {
        $this->modelMerek = new MerekModel();
        $this->modelTransaksi = new TransaksiModel();
    }

    public function view()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        $dataMerekBaju = $this->modelMerek->getAllMerekBaju();
        $jumlah = $this->modelMerek->getJumlahMerek();
        extract($dataJumlahPermintaan);
        extract($dataMerekBaju);
        require_once("View/admin/merek_baju/index.php");
    }

    public function tambah()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        require_once("View/admin/merek_baju/tambah_merek_baju.php");
    }

    public function edit()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        $idMerek = $_GET['id'];
        $dataMerekBaju = $this->modelMerek->getDataMerekBaju($idMerek);
        require_once("View/admin/merek_baju/edit_merek_baju.php");
    }

    public function store()
    {
        $namaMerek = $_POST['merek'];
        $this->modelMerek->prosesStoreMerek($namaMerek);
        header("location: index.php?view=admin&page=merekBaju&aksi=view");
    }

    public function update()
    {
        $idMerek = $_POST['idMerek'];
        $namaMerek = $_POST['merek'];
        $this->modelMerek->prosesUpdateMerek($idMerek, $namaMerek);
        header("location: index.php?view=admin&page=merekBaju&aksi=view");
    }
}

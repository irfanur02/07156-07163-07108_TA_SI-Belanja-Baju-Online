<?php

class UkuranController

{

    private $modelUkuran;
    private $modelTransaksi;

    public function __construct()
    {
        $this->modelUkuran = new UkuranModel();
        $this->modelTransaksi = new TransaksiModel();
    }

    public function view()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBaju();
        extract($dataUkuranBaju);
        require_once("View/admin/ukuran_baju/index.php");
    }

    public function tambah()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        require_once("View/admin/ukuran_baju/tambah_ukuran_baju.php");
    }

    public function edit()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        $idUkuran = $_GET['id'];
        $dataUkuranBaju = $this->modelUkuran->getUkuranBaju($idUkuran);
        require_once("View/admin/ukuran_baju/edit_ukuran_baju.php");
    }

    public function store()
    {
        $namaUkuran = $_POST['ukuran'];
        $this->modelUkuran->prosesStoreUkuran($namaUkuran);
        header("location: index.php?view=admin&page=ukuranBaju&aksi=view");
    }

    public function update()
    {
        $idUkuran = $_POST['idUkuran'];
        $ukuran = $_POST['ukuran'];
        $this->modelUkuran->prosesUpdateUkuran($idUkuran, $ukuran);
        header("location: index.php?view=admin&page=ukuranBaju&aksi=view");
    }
}

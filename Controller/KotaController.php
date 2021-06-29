<?php

class KotaController
{

    private $modelKota;
    private $modelTransaksi;

    public function __construct()
    {
        $this->modelKota = new KotaModel();
        $this->modelTransaksi = new TransaksiModel();
    }

    public function view()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        $dataKota = $this->modelKota->getAllKota();
        $jumlah = $this->modelKota->getJumlahKota();
        extract($dataJumlahPermintaan);
        extract($dataKota);
        require_once("View/admin/kota/index.php");
    }

    public function tambah()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        require_once("View/admin/kota/tambah_kota.php");
    }

    public function edit()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        $idKota = $_GET['id'];
        $dataKota = $this->modelKota->getKota($idKota);
        extract($dataJumlahPermintaan);
        extract($dataKota);
        require_once("View/admin/kota/edit_kota.php");
    }

    public function store()
    {
        $kota = $_POST['kota'];
        $this->modelKota->prosesStoreKota($kota);
        header("location: index.php?view=admin&page=kota&aksi=view");
    }

    public function update()
    {
        $idKota = $_POST['idKota'];
        $kota = $_POST['kota'];
        $this->modelKota->prosesUpdateKota($idKota, $kota);
        header("location: index.php?view=admin&page=kota&aksi=view");
    }
}

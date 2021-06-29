<?php

class JenisController
{

    private $modelJenis;
    private $modelTransaksi;

    public function __construct()
    {
        $this->modelJenis = new JenisModel();
        $this->modelTransaksi = new TransaksiModel();
    }

    public function view()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        $dataJenisBaju = $this->modelJenis->getAllJenisBaju();
        $jumlah = $this->modelJenis->getJumlahJenis();
        extract($dataJumlahPermintaan);
        extract($dataJenisBaju);
        require_once("View/admin/jenis_baju/index.php");
    }

    public function tambah()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        require_once("View/admin/jenis_baju/tambah_jenis_baju.php");
    }

    public function edit()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        $idJenis = $_GET['id'];
        $dataJenisBaju = $this->modelJenis->getDataJenisBaju($idJenis);
        require_once("View/admin/jenis_baju/edit_jenis_baju.php");
    }

    public function store()
    {
        $namaJenis = $_POST['jenis'];
        $this->modelJenis->prosesStore($namaJenis);
        header("location: index.php?view=admin&page=jenisBaju&aksi=view");
    }

    public function update()
    {
        $idJenis = $_POST['idJenis'];
        $namaJenis = $_POST['jenis'];
        $this->modelJenis->prosesUpdate($idJenis, $namaJenis);
        header("location: index.php?view=admin&page=jenisBaju&aksi=view");
    }
}

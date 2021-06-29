<?php

class KategoriController
{

    private $modelKategori;
    private $modelTransaksi;

    public function __construct()
    {
        $this->modelKategori = new KategoriModel();
        $this->modelTransaksi = new TransaksiModel();
    }

    public function view()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBaju();
        extract($dataKategoriBaju);
        extract($dataJumlahPermintaan);
        $jumlah = $this->modelKategori->getJumlahDataKategori();
        require_once("View/admin/kategori_baju/index.php");
    }

    public function tambah()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        require_once("View/admin/kategori_baju/tambah_kategori_baju.php");
    }

    public function edit()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        $idKategori = $_GET['id'];
        $dataKategoriBaju = $this->modelKategori->getDataKategori($idKategori);
        require_once("View/admin/kategori_baju/edit_kategori_baju.php");
    }

    public function store()
    {
        $namaKategori = $_POST['kategori'];
        $this->modelKategori->prosesStoreKategori($namaKategori);
        header("location: index.php?view=admin&page=kategoriBaju&aksi=view");
    }

    public function update()
    {
        $idKategori = $_POST['idKategori'];
        $kategori = $_POST['kategori'];
        $this->modelKategori->prosesUpdataKategori($idKategori, $kategori);
        header("location: index.php?view=admin&page=kategoriBaju&aksi=view");
    }
}

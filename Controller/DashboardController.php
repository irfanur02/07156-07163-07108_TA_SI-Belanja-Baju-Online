<?php

class DashboardController
{

    private $modelDashboard;
    private $modelTransaksi;
    private $modelJenis;
    private $modelMerek;
    private $modelProduk;
    private $modelKota;
    private $modelKurir;
    private $modelKategori;

    public function __construct()
    {
        $this->modelTransaksi = new TransaksiModel();
        $this->modelJenis = new JenisModel();
        $this->modelMerek = new MerekModel();
        $this->modelProduk = new ProdukModel();
        $this->modelKota = new KotaModel();
        $this->modelKurir = new KurirModel();
        $this->modelKategori = new KategoriModel();
    }

    /**
     * berfungsi untuk menampilkan halaman dashboard (admin)
     */
    public function view()
    {
        $dataJumlahKategori = $this->modelKategori->getJumlahKategori();
        $dataMerekTerpopuler = $this->modelMerek->getAllMerekTerpopuler();
        $dataJenisTerpopuler = $this->modelJenis->getAllJenisTerpopuler();
        $dataBajuTerpopuler = $this->modelProduk->getAllBajuPopuler();
        $dataBajuTerfavorite = $this->modelProduk->getAllBajuFavoriteTerbanyak();
        $dataKotaTerbanyakTransaksi = $this->modelKota->getAllKotaTerbanyakTransaksi();
        $dataKurirTerbanyakDigunakan = $this->modelKurir->getAllKurirTerbanyakDigunakan();
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        extract($dataJumlahKategori);
        extract($dataMerekTerpopuler);
        extract($dataJenisTerpopuler);
        extract($dataBajuTerpopuler);
        extract($dataBajuTerfavorite);
        extract($dataKotaTerbanyakTransaksi);
        extract($dataKurirTerbanyakDigunakan);
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/index.php");
    }
}

<?php

class ProdukController
{
    private $modelProduk;
    private $modelTransaksi;
    private $modelFavorite;
    private $modelJenis;
    private $modelMerek;
    private $modelKategori;
    private $modelUkuran;

    public function __construct()
    {
        $this->modelProduk = new ProdukModel();
        $this->modelJenis = new JenisModel();
        $this->modelMerek = new MerekModel();
        $this->modelKategori = new KategoriModel();
        $this->modelUkuran = new UkuranModel();
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
        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataHargaMinProduk = $this->modelProduk->getHargaMinProduk();
        $dataHargaMaxProduk = $this->modelProduk->getHargaMaxProduk();
        $dataSeluruhBaju = $this->modelProduk->getSeluruhBaju();
        $dataBajuPopuler = $this->modelProduk->getBajuPopuler(5);
        $dataKeranjangUser = $this->modelTransaksi->getKeranjang($idUser);
        $jumlahKeranjangUser = $this->modelTransaksi->getJumlahKeranjangUser($idUser);
        $dataBajuFavorite = $this->modelFavorite->getBajuFavorite($idUser);
        extract($dataSeluruhBaju);
        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        extract($dataBajuPopuler);
        extract($dataKeranjangUser);
        extract($dataBajuFavorite);

        $_SESSION['statusUser'] = 'notLogged'; // hanya percobaan

        if (empty($jumlahKeranjangUser)) {
            $jumlahKeranjang =  0;
        } else {
            $jumlahKeranjang =  $jumlahKeranjangUser['jumlahKeranjang'];
        }

        $data = "produk_populer";
        $hasilPencarian = "found";
        $hargaMinProduk = $dataHargaMinProduk['hargaMin'];
        $hargaMaxProduk = $dataHargaMaxProduk['hargaMax'];
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/index.php");
    }

    /**
     * berfungsi untuk menampilkan hasil pencarian produk
     */
    public function cariBaju()
    {
        //? nunggu progress login
        //! $idUser = $_SESSION['user']['id'];
        $idUser = 4;
        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataHargaMinProduk = $this->modelProduk->getHargaMinProduk();
        $dataHargaMaxProduk = $this->modelProduk->getHargaMaxProduk();
        $dataKeranjangUser = $this->modelTransaksi->getKeranjang($idUser);
        $jumlahKeranjangUser = $this->modelTransaksi->getJumlahKeranjangUser($idUser);
        $dataBajuFavorite = $this->modelFavorite->getBajuFavorite($idUser);
        $merek = "";
        $jenis = "";
        $kategori = "";
        $deskripsi = "";
        $pencarian = explode(" ", $_POST['pencarian']);
        $jumlahKata = count($pencarian);
        for ($i = 0; $i < $jumlahKata; $i++) {
            for ($j = 0; $j < $jumlahKata; $j++) {
                if (!empty($this->modelMerek->getMerekBaju($pencarian[$i]))) {
                    $merek = $pencarian[$i];
                } elseif (!empty($this->modelJenis->getJenisBaju($pencarian[$i]))) {
                    $jenis = $pencarian[$i];
                } elseif (!empty($this->modelKategori->getKategoriBaju($pencarian[$i]))) {
                    $kategori = $pencarian[$i];
                } elseif (!empty($this->modelProduk->getDeskripsiBaju($pencarian[$i]))) {
                    $deskripsi = $pencarian[$i];
                }
            }
        }

        if (empty($merek) && empty($jenis) && empty($kategori) && empty($deskripsi)) {
            $hasilPencarian = "notFound";
        } else {
            $hasilPencarian = "found";
            $dataSeluruhBaju = $this->modelProduk->getAllPencarianBaju($merek, $jenis, $kategori, $deskripsi);
            extract($dataSeluruhBaju);
        }

        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        extract($dataKeranjangUser);
        extract($dataBajuFavorite);

        if (empty($jumlahKeranjangUser)) {
            $jumlahKeranjang =  0;
        } else {
            $jumlahKeranjang =  $jumlahKeranjangUser['jumlahKeranjang'];
        }

        $hargaMinProduk = $dataHargaMinProduk['hargaMin'];
        $hargaMaxProduk = $dataHargaMaxProduk['hargaMax'];
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/index.php");
    }

    /**
     * berfungsi untuk menampilkan hasil pencarian filter produk
     */
    public function filterPencarian()
    {
        $jenis = $_POST['jenis'];
        $kategori = $_POST['kategori'];
        $merek = $_POST['merek'];
        $ukuran = $_POST['ukuran'];
        $hargaMin = $_POST['hargaTerkecil'];
        $hargaMax = $_POST['hargaTerbesar'];
        //? nunggu progress login
        //! $idUser = $_SESSION['user']['id'];
        $idUser = 4;
        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataHargaMinProduk = $this->modelProduk->getHargaMinProduk();
        $dataHargaMaxProduk = $this->modelProduk->getHargaMaxProduk();
        $dataKeranjangUser = $this->modelTransaksi->getKeranjang($idUser);
        $jumlahKeranjangUser = $this->modelTransaksi->getJumlahKeranjangUser($idUser);
        $dataBajuFavorite = $this->modelFavorite->getBajuFavorite($idUser);

        if (isset($_POST['populer'])) {
            $dataSeluruhBaju = $this->modelProduk->getAllPencarianFilterBajuPopuler($merek, $jenis, $kategori, $ukuran, $hargaMin, $hargaMax);
        } else {
            $dataSeluruhBaju = $this->modelProduk->getAllPencarianFilterBaju($merek, $jenis, $kategori, $ukuran, $hargaMin, $hargaMax);
            // var_export($dataSeluruhBaju);
            // die();
        }

        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        extract($dataSeluruhBaju);
        extract($dataKeranjangUser);
        extract($dataBajuFavorite);

        if (empty($jumlahKeranjangUser)) {
            $jumlahKeranjang =  0;
        } else {
            $jumlahKeranjang =  $jumlahKeranjangUser['jumlahKeranjang'];
        }

        $hasilPencarian = "found";
        $hargaMinProduk = $dataHargaMinProduk['hargaMin'];
        $hargaMaxProduk = $dataHargaMaxProduk['hargaMax'];
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/index.php");
    }
}
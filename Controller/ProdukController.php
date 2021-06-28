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
     * berfungsi untuk menampilkan halaman tambah baju
     */
    public function tambah()
    {
        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/produk/tambah_produk.php");
    }

    /**
     * berfungsi untuk proses tambah baju
     */
    public function store()
    {
        $jenis = $_POST['jenis'];
        $kategori = $_POST['kategori'];
        $merek = $_POST['merek'];
        $ukuran = $_POST['ukuran'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        //* olah gambar
        $namaFile = $_FILES['gambar']['name'];
        $ekstensi = explode('.', $namaFile);
        $ekstensi = end($ekstensi);
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensi;
        $tmpName = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmpName, 'assets/img/tersimpan/' . $namaFileBaru);
        $this->modelProduk->prosesStore($jenis, $kategori, $merek, $ukuran, $deskripsi, $stok, $harga, $namaFileBaru);
        header("location: index.php?view=admin&page=produk&aksi=view");
    }

    /**
     * berfungsi untuk menampilkan halaman edit
     */
    public function edit()
    {
        $idBaju = $_GET['id'];
        $dataBaju = $this->modelProduk->getDataBaju($idBaju);
        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        extract($dataBaju);
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/produk/edit_produk.php");
    }

    /**
     * berfungsi untuk proses update baju
     */
    public function update()
    {
        $idBaju = $_POST['idBaju'];
        $gambarLama = $_POST['gambarLama'];
        $jenis = $_POST['jenis'];
        $kategori = $_POST['kategori'];
        $merek = $_POST['merek'];
        $ukuran = $_POST['ukuran'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        if ($_FILES['gambar']['error'] == 4) {
            $namaFileBaru = $gambarLama;
        } else {
            //* olah gambar
            $namaFile = $_FILES['gambar']['name'];
            $ekstensi = explode('.', $namaFile);
            $ekstensi = end($ekstensi);
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensi;
            $tmpName = $_FILES['gambar']['tmp_name'];
            move_uploaded_file($tmpName, 'assets/img/tersimpan/' . $namaFileBaru);
        }
        $this->modelProduk->prosesUpdate($idBaju, $jenis, $kategori, $merek, $ukuran, $deskripsi, $stok, $harga, $namaFileBaru);
        header("location: index.php?view=admin&page=produk&aksi=view");
    }

    /**
     * berfungsi untuk menampilkan tampilan awal manajemen produk
     */
    public function viewAdmin()
    {
        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataSeluruhBajuFavorite = $this->modelProduk->getAllBajuFavorite();
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        extract($dataSeluruhBajuFavorite);
        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        $jumlahBaju = $this->modelProduk->getJumlahBaju();
        $hasilPencarian = "found";
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/produk/index.php");
    }

    /**
     * berfungsi untuk menampilkan hasil pencarian produk view admin
     */
    public function adminCariBaju()
    {
        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
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
            $dataSeluruhBajuFavorite = $this->modelProduk->getAllPencarianBaju($merek, $jenis, $kategori, $deskripsi);
            extract($dataSeluruhBajuFavorite);
        }

        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        extract($dataJumlahPermintaan);

        $jumlahBaju = $this->modelProduk->getJumlahBaju();
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/produk/index.php");
    }

    /**
     * berfungsi untuk menampilkan hasil pencarian filter produk view admin
     */
    public function adminFilterPencarian()
    {
        $jenis = $_POST['jenis'];
        $kategori = $_POST['kategori'];
        $merek = $_POST['merek'];
        $ukuran = $_POST['ukuran'];

        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();


        if (isset($_POST['harga'])) {
            $harga = $_POST['harga'];
            if ($harga == "max") $harga = 'DESC';
            else $harga = 'ASC';
            $dataSeluruhBajuFavorite = $this->modelProduk->getAllPencarianFilterBajuByHarga($merek, $jenis, $kategori, $ukuran, $harga);
        } else {
            $dataSeluruhBajuFavorite = $this->modelProduk->getAdminAllPencarianFilterBaju($merek, $jenis, $kategori, $ukuran);
        }

        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        extract($dataSeluruhBajuFavorite);
        extract($dataJumlahPermintaan);

        $hasilPencarian = "found";
        $jumlahBaju = $this->modelProduk->getJumlahBaju();
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/produk/index.php");
    }

    /**
     * berfungsi untuk melakukan filter produk berdasarkan populer atau favorite
     */
    public function filterProduk($filter)
    {
        if ($filter == "populer") {
            $dataSeluruhBajuFavorite = $this->modelProduk->getAllBajuPopuler();
            $judul = "populer";
        } elseif ($filter == "favorite") {
            $dataSeluruhBajuFavorite = $this->modelProduk->getAllBajuFavoriteTerbanyak();
            $judul = "favorite";
        }
        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        extract($dataSeluruhBajuFavorite);
        $jumlahBaju = $this->modelProduk->getJumlahBaju();
        $hasilPencarian = "found";
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/produk/index.php");
    }

    /**
     * berfungsi untuk menampilkan tampilan awal dari aplikasi
     */
    public function viewUser()
    {
        if (isset($_SESSION['user'])) {
            $idUser = $_SESSION['user']['id_user'];
            $dataKeranjangUser = $this->modelTransaksi->getKeranjang($idUser);
            $jumlahKeranjangUser = $this->modelTransaksi->getJumlahKeranjangUser($idUser);
            $dataBajuFavorite = $this->modelFavorite->getBajuFavorite($idUser);
            extract($dataKeranjangUser);
            extract($dataBajuFavorite);

            if (empty($jumlahKeranjangUser)) {
                $jumlahKeranjang =  0;
            } else {
                $jumlahKeranjang =  $jumlahKeranjangUser['jumlahKeranjang'];
            }
        } else {
            $_SESSION['statusUser'] = 'notLogged';
        }
        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataHargaMinProduk = $this->modelProduk->getHargaMinProduk();
        $dataHargaMaxProduk = $this->modelProduk->getHargaMaxProduk();
        $dataSeluruhBaju = $this->modelProduk->getSeluruhBaju();
        $dataBajuPopuler = $this->modelProduk->getBajuPopuler(5);

        extract($dataSeluruhBaju);
        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        extract($dataBajuPopuler);

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
        if (isset($_SESSION['user'])) {
            $idUser = $_SESSION['user']['id_user'];
            $dataKeranjangUser = $this->modelTransaksi->getKeranjang($idUser);
            $jumlahKeranjangUser = $this->modelTransaksi->getJumlahKeranjangUser($idUser);
            $dataBajuFavorite = $this->modelFavorite->getBajuFavorite($idUser);
            extract($dataKeranjangUser);
            extract($dataBajuFavorite);

            if (empty($jumlahKeranjangUser)) {
                $jumlahKeranjang =  0;
            } else {
                $jumlahKeranjang =  $jumlahKeranjangUser['jumlahKeranjang'];
            }
        } else {
            $_SESSION['statusUser'] = 'notLogged';
        }

        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataHargaMinProduk = $this->modelProduk->getHargaMinProduk();
        $dataHargaMaxProduk = $this->modelProduk->getHargaMaxProduk();
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

        if (isset($_SESSION['user'])) {
            $idUser = $_SESSION['user']['id_user'];
            $dataKeranjangUser = $this->modelTransaksi->getKeranjang($idUser);
            $jumlahKeranjangUser = $this->modelTransaksi->getJumlahKeranjangUser($idUser);
            $dataBajuFavorite = $this->modelFavorite->getBajuFavorite($idUser);
            extract($dataKeranjangUser);
            extract($dataBajuFavorite);

            if (empty($jumlahKeranjangUser)) {
                $jumlahKeranjang =  0;
            } else {
                $jumlahKeranjang =  $jumlahKeranjangUser['jumlahKeranjang'];
            }
        } else {
            $_SESSION['statusUser'] = 'notLogged';
        }

        $dataJenisBaju = $this->modelJenis->getAllJenisBajuAktif();
        $dataMerekBaju = $this->modelMerek->getAllMerekBajuAktif();
        $dataKategoriBaju = $this->modelKategori->getAllKategoriBajuAktif();
        $dataUkuranBaju = $this->modelUkuran->getAllUkuranBajuAktif();
        $dataHargaMinProduk = $this->modelProduk->getHargaMinProduk();
        $dataHargaMaxProduk = $this->modelProduk->getHargaMaxProduk();

        if (isset($_POST['populer'])) {
            $dataSeluruhBaju = $this->modelProduk->getAllPencarianFilterBajuPopuler($merek, $jenis, $kategori, $ukuran, $hargaMin, $hargaMax);
        } else {
            $dataSeluruhBaju = $this->modelProduk->getAllPencarianFilterBaju($merek, $jenis, $kategori, $ukuran, $hargaMin, $hargaMax);
        }

        extract($dataJenisBaju);
        extract($dataMerekBaju);
        extract($dataKategoriBaju);
        extract($dataUkuranBaju);
        extract($dataSeluruhBaju);

        $hasilPencarian = "found";
        $hargaMinProduk = $dataHargaMinProduk['hargaMin'];
        $hargaMaxProduk = $dataHargaMaxProduk['hargaMax'];
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/index.php");
    }
}

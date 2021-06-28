<?php

class LaporanController
{

    private $modelLaporan;
    private $modelUser;
    private $modelTransaksi;

    public function __construct()
    {
        $this->modelLaporan = new LaporanModel();
        $this->modelUser = new UserModel();
        $this->modelTransaksi = new TransaksiModel();
    }

    /**
     * berfungsi untuk menampilkan halaman utama laporan
     */
    public function index()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/laporan/index.php");
    }

    /**
     * berfungsi untuk mendapatkan seluruh laporan transaksi berdasarkan tanggal
     */
    public function getLaporanSemuaTransaksi()
    {
        if (isset($_POST['periodeTanggal']) && isset($_POST['totPemTertinggi'])) {
            $tglAwal = $_POST['tglAwal'];
            $tglAkhir = $_POST['tglAkhir'];
            $dataLaporan = $this->modelLaporan->getSeluruhLaporanByRangeTanggalSortJumlahTransaksiDesc($tglAwal, $tglAkhir);
        } elseif (isset($_POST['periodeTanggal'])) {
            $tglAwal = $_POST['tglAwal'];
            $tglAkhir = $_POST['tglAkhir'];
            $dataLaporan = $this->modelLaporan->getSeluruhLaporanByRangeTanggal($tglAwal, $tglAkhir);
            $data = "periodeTanggal";
        } elseif (isset($_POST['totPemTertinggi'])) {
            $dataLaporan = $this->modelLaporan->getSeluruhLaporanSortJumlahTransaksiDesc();
        } else {
            $dataLaporan = $this->modelLaporan->getSeluruhLaporanByTanggal();
        }
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        extract($dataLaporan);
        $th = "Tanggal Transaksi";
        $judul = "semuaTransaksi";
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/laporan/index.php");
    }

    /**
     * berfungsi untuk mendapatkan detail seluruh laporan berdasarkan tanggal
     */
    public function getDetailLaporanByTanggal()
    {
        $tanggal = $_GET['tanggal'];
        $dataLaporan = $this->modelLaporan->getLaporanByTanggal($tanggal);
        $dataDetailLaporan = $this->modelLaporan->getDetailLaporanByTanggal($tanggal);
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        extract($dataLaporan);
        extract($dataDetailLaporan);
        $data = "laporanByTanggal";
        $judul = "semuaTransaksi";
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/laporan/laporan_tiap_user.php");
    }

    /**
     * berfungsi untuk mendapatkan seluruh laporan berdasarkan nama user
     */
    public function getLaporanTiapUser()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        if (isset($_POST['transaksiTiapUser'])) {
            if ($_POST['transaksiTiapUser'] == "berdasarkanNama") {
                $namaUser = $_POST['namaUser'];
                $dataLaporan = $this->modelLaporan->getLaporanUser($namaUser);
            } elseif ($_POST['transaksiTiapUser'] == "berdasarkanTransaksiTerbanyak") {
                $dataLaporan = $this->modelLaporan->getLaporanTiapUserByTransaksiTerbanyak();
            }
            extract($dataLaporan);
            $th = "Nama User";
            $judul = "berdasarkanUser";
            $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
            require_once("View/admin/laporan/index.php");
        } else {
            $dataLaporan = $this->modelLaporan->getLaporanTiapUser();
            extract($dataLaporan);
            $th = "Nama User";
            $judul = "berdasarkanUser";
            $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
            require_once("View/admin/laporan/index.php");
        }
    }

    /**
     * berfungsi untuk mendapatkan seluruh detail laporan berdasarkan user
     */
    public function getLaporanUser($statusTransaksi)
    {
        $idUser = $_GET['id'];
        $dataUser = $this->modelUser->getDataUser($idUser);
        $dataLaporan = $this->modelLaporan->getLaporanTransaksiUser($idUser, $statusTransaksi);
        $dataDetailLaporan = $this->modelLaporan->getDetailLaporanTransaksiUser($idUser, $statusTransaksi);
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        extract($dataUser);
        extract($dataLaporan);
        extract($dataDetailLaporan);
        if ($statusTransaksi == "Diproses") {
            $btnDiproses = "active";
            $btnDikirim = "inactive";
            $btnDiterima = "inactive";
        } elseif ($statusTransaksi == "Dikirim") {
            $btnDiproses = "iactive";
            $btnDikirim = "active";
            $btnDiterima = "inactive";
        } elseif ($statusTransaksi == "Diterima") {
            $btnDiproses = "iactive";
            $btnDikirim = "inactive";
            $btnDiterima = "active";
        }
        $data = "laporanTiapUser";
        $judul = "berdasarkanUser";
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/admin/laporan/laporan_tiap_user.php");
    }
}

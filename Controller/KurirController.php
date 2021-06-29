
<?php

class KurirController
{

    private $modelKurir;
    private $modelTransaksi;

    public function __construct()
    {
        $this->modelKurir = new KurirModel();
        $this->modelTransaksi = new TransaksiModel();
    }

    public function view()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        $dataKurir = $this->modelKurir->getKurir();
        $jumlah = $this->modelKurir->getJumlahKurir();
        extract($dataJumlahPermintaan);
        extract($dataKurir);
        require_once("View/admin/kurir/index.php");
    }

    public function tambah()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        extract($dataJumlahPermintaan);
        require_once("View/admin/kurir/tambah_kurir.php");
    }

    public function edit()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        $idKurir = $_GET['id'];
        $dataKurir = $this->modelKurir->getDataKurir($idKurir);
        extract($dataJumlahPermintaan);
        extract($dataKurir);
        require_once("View/admin/kurir/edit_kurir.php");
    }

    public function store()
    {
        $jasaKurir = $_POST['jasaKurir'];
        $biaya = $_POST['biaya'];
        $this->modelKurir->prosesStoreKurir($jasaKurir, $biaya);
        header("location: index.php?view=admin&page=kurir&aksi=view");
    }

    public function update()
    {
        $idKurir = $_POST['idKurir'];
        $jasaKurir = $_POST['jasaKurir'];
        $biaya = $_POST['biaya'];
        $this->modelKurir->prosesUpdateKurir($idKurir, $jasaKurir, $biaya);
        header("location: index.php?view=admin&page=kurir&aksi=view");
    }

    public function sortHarga()
    {
        if (isset($_POST['harga'])) {
            if ($_POST['harga'] == "max") $harga = "DESC";
            else $harga = "ASC";
            $dataKurir = $this->modelKurir->prosesFilterHargaKurir($harga);
            extract($dataKurir);
        }
        $jumlah = $this->modelKurir->getJumlahKurir();
        require_once("View/admin/kurir/index.php");
    }
}

<?php

class FavoriteController
{
    private $modelFavorite;
    private $modelTransaksi;

    public function __construct()
    {
        $this->modelFavorite = new FavoriteModel();
        $this->modelTransaksi = new TransaksiModel();
    }

    /**
     * berfungsi untuk menampilkan tampilan favorite berdasarkan id user
     */
    public function view()
    {
        $idUser = $_SESSION['user']['id_user'];
        $jumlahKeranjangUser = $this->modelTransaksi->getJumlahKeranjangUser($idUser);
        $dataBajuFavorite = $this->modelFavorite->getBajuFavorite($idUser);
        extract($dataBajuFavorite);

        if (empty($jumlahKeranjangUser)) {
            $jumlahKeranjang =  0;
        } else {
            $jumlahKeranjang =  $jumlahKeranjangUser['jumlahKeranjang'];
        }
        $BASE_URL = "http://localhost/projek-belanjaBajuOnline";
        require_once("View/favorite.php");
    }

    /**
     * berfungsi untuk meyimpan produk ke dalam favorite
     */
    public function store()
    {
        $idUser = $_POST['idUser'];
        $idBaju = $_POST['idBaju'];
        if (empty($this->modelFavorite->cekFavoriteUser($idUser, $idBaju))) {
            $this->modelFavorite->prosesStore($idUser, $idBaju);
        }
    }

    /**
     * berfungsi untuk menghapus favorite berdasarkan id wishlist
     */
    public function delete()
    {
        $idWishlist = $_GET['idWishlist'];
        $this->modelFavorite->delete($idWishlist);
        header("location: index.php?page=favorite&aksi=view");
    }
}

<?php

class FavoriteModel
{

    /**
     * berfungsi untuk proses menyimpan data produk favorite berdasarkan id user dan id baju
     */
    public function prosesStore($idUser, $idBaju)
    {
        $sql = "INSERT INTO wishlist(id_baju, id_user) VALUES($idBaju, $idUser)";
        koneksi()->query($sql);
    }

    /**
     * berfungsi untuk mendapatkan produk yang ada di favorite berdasarkan id user, apakah produk tersebut sudah ada di favorite atau belum
     */
    public function cekFavoriteUser($idUser, $idBaju)
    {
        $sql = "SELECT * FROM wishlist WHERE id_baju = $idBaju AND id_user = $idUser";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     *  berfungsi untuk mendapatkan produk favorite berdasarkan id user
     */
    public function getBajuFavorite($idUser)
    {
        $sql = "SELECT id_baju AS idBaju FROM wishlist WHERE id_user = $idUser";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }
}

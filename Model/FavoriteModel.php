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
        $sql = "SELECT wi.id_baju AS idBaju, wi.id_wishlist AS idWishlist, ba.gambar_baju AS gambarProduk, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, 
                    ba.deskripsi_baju AS detailProduk, ba.harga_baju AS hargaProduk, sb.jumlah_baju AS stok 
                FROM wishlist wi 
                JOIN baju ba ON wi.id_baju = ba.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                WHERE wi.id_user = $idUser";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     *  berfungsi untuk mengahapus data wishlist berdasarkan id wishlist
     */
    public function delete($idWishlist)
    {
        $sql = "DELETE FROM wishlist WHERE id_wishlist = $idWishlist";
        koneksi()->query($sql);
    }
}

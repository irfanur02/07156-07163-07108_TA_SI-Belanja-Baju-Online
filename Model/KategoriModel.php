<?php

class KategoriModel
{
    /**
     * berfungsi untuk mendapatkan semua kategori produk
     */
    public function getAllKategoriBaju()
    {
        $sql = "SELECT id_kategori_baju AS idKategoriBaju, nama_kategori_baju AS kategoriBaju FROM kategori_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua kategori produk yang ada di produk
     */
    public function getAllKategoriBajuAktif()
    {
        $sql = "SELECT DISTINCT kb.id_kategori_baju AS idKategoriBaju, kb.nama_kategori_baju AS kategoriBaju 
                FROM kategori_baju kb 
                JOIN baju ba ON kb.id_kategori_baju = ba.id_kategori_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan kategori produk berdasarkan pencarian
     */
    public function getKategoriBaju($pencarian)
    {
        $sql = "SELECT * FROM kategori_baju WHERE nama_kategori_baju LIKE '%$pencarian%'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}

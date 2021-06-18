<?php

class MerekModel
{
    /**
     * berfungsi untuk mendapatkan semua merek produk
     */
    public function getAllMerekBaju()
    {
        $sql = "SELECT id_merek_baju AS idMerekBaju, nama_merek_baju AS merekBaju FROM merek_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua merek produk yang ada di produk
     */
    public function getAllMerekBajuAktif()
    {
        $sql = "SELECT DISTINCT mb.id_merek_baju AS idMerekBaju, mb.nama_merek_baju AS merekBaju 
                FROM merek_baju mb 
                JOIN baju ba ON mb.id_merek_baju = ba.id_merek_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan merek produk berdasarkan pencarian
     */
    public function getMerekBaju($pencarian)
    {
        $sql = "SELECT * FROM merek_baju WHERE nama_merek_baju LIKE '%$pencarian%'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}

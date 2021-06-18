<?php

class UkuranModel
{
    /**
     * berfungsi untuk mendapatkan semua ukuran produk
     */
    public function getAllUkuranBaju()
    {
        $sql = "SELECT id_ukuran_baju AS idUkuranBaju, satuan_ukuran_baju AS ukuranBaju FROM ukuran_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua ukuran produk yang ada di produk
     */
    public function getAllUkuranBajuAktif()
    {
        $sql = "SELECT DISTINCT ub.id_ukuran_baju AS idUkuranBaju, ub.satuan_ukuran_baju AS ukuranBaju 
                FROM ukuran_baju ub 
                JOIN baju ba ON ub.id_ukuran_baju = ba.id_ukuran_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }
}

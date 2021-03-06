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

    public function getUkuranBaju($idUkuran)
    {
        $sql = "SELECT * FROM ukuran_baju WHERE id_ukuran_baju = $idUkuran";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesStoreUkuran($satuanUkuran)
    {
        $sql = "INSERT INTO ukuran_baju(satuan_ukuran_baju) VALUES('$satuanUkuran')";
        koneksi()->query($sql);
    }

    public function prosesUpdateUkuran($idUkuran, $satuanUkuran)
    {
        $sql = "UPDATE ukuran_baju SET satuan_ukuran_baju = '$satuanUkuran' WHERE id_ukuran_baju = $idUkuran";
        koneksi()->query($sql);
    }
}

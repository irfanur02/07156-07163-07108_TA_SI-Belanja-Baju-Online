<?php

class JenisModel
{
    /**
     * berfungsi untuk mendapatkan semua jenis produk
     */
    public function getAllJenisBaju()
    {
        $sql = "SELECT id_jenis_baju AS idJenisBaju, nama_jenis_baju AS jenisBaju FROM jenis_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua jenis produk yang ada di produk
     */
    public function getAllJenisBajuAktif()
    {
        $sql = "SELECT DISTINCT jb.id_jenis_baju AS idJenisBaju, jb.nama_jenis_baju AS jenisBaju 
                FROM jenis_baju jb 
                JOIN baju ba ON jb.id_jenis_baju = ba.id_jenis_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan jenis produk berdasarkan pencarian
     */
    public function getJenisBaju($pencarian)
    {
        $sql = "SELECT * FROM jenis_baju WHERE nama_jenis_baju LIKE '%$pencarian%'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}

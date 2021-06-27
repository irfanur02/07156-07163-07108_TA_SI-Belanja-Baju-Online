<?php

class KotaModel
{

    /**
     * berfungsi untuk mendapatkan semua kota yang ada didatabase
     */
    public function getAllKota()
    {
        $sql = "SELECT * FROM kota";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }
}

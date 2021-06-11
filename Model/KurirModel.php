<?php

class KurirModel
{
    /**
     * berfungsi untuk mendapatkan seluruh data kurir
     */
    public function getKurir()
    {
        $sql = "SELECT * FROM kurir";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }
}

<?php

class KurirModel
{

    /**
     * berfungsi untuk mendapatkan semua kurir yang sering banyak dipakai
     */
    public function getAllKurirTerbanyakDigunakan()
    {
        $sql = "SELECT ku.jasa_kurir AS kurir, COUNT(*) AS jumlah 
                FROM kurir ku 
                JOIN transaksi tr ON ku.id_kurir = tr.id_kurir 
                WHERE tr.tanggal_transaksi IS NOT NULL GROUP BY tr.id_kurir ORDER BY jumlah DESC, kurir ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

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

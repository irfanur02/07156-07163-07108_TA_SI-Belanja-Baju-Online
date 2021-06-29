<?php

class KotaModel
{

    /**
     * berfungsi untuk mendapatkan semua kota yang paling banyak melakukan transaksi
     */
    public function getAllKotaTerbanyakTransaksi()
    {
        $sql = "SELECT ko.nama_kota AS kota, COUNT(*) AS jumlah 
                FROM kota ko 
                JOIN owner_user ou ON ko.id_kota = ou.id_kota 
                JOIN users us ON ou.id_user = us.id_user 
                JOIN transaksi tr ON us.id_user = tr.id_user 
                WHERE tr.tanggal_transaksi IS NOT NULL GROUP BY tr.id_user ORDER BY jumlah DESC, kota ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

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

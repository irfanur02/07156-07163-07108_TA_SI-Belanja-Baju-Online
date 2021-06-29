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

    public function getKota($pencarian)
    {
        $sql = "SELECT * FROM kota WHERE nama_kota LIKE '%$pencarian%'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesStoreKota($idKota,$namaKota)
    {
        $namaKota = $_POST['nama_kota'];
        $sql = "INSERT INTO kota(id_kota,nama_kota) VALUES('$idKota','$namaKota')";
        return koneksi()->query($sql);
    }

    public function prosesKota($idKota, $namaKota)
    {
        $sql = "UPDATE kota SET nama_kota='$namaKota' WHERE id_kota = $idKota";
        $query = koneksi()->query($sql);
        return $query;
    }
}

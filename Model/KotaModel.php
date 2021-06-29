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

    public function getJumlahKota()
    {
        $sql = "SELECT COUNT(*) AS jumlah FROM kota";
        $query = koneksi()->query($sql);
        $hasilQuery =  $query->fetch_assoc();
        $jumlah = $hasilQuery['jumlah'];
        return $jumlah;
    }

    public function getKota($idKota)
    {
        $sql = "SELECT * FROM kota WHERE id_kota = $idKota";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesStoreKota($namaKota)
    {
        $sql = "INSERT INTO kota(nama_kota) VALUES('$namaKota')";
        koneksi()->query($sql);
    }

    public function prosesUpdateKota($idKota, $namaKota)
    {
        $sql = "UPDATE kota SET nama_kota = '$namaKota' WHERE id_kota = $idKota";
        koneksi()->query($sql);
    }
}

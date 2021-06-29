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

<<<<<<< HEAD
    public function getJumlahKurir()
    {
        $sql = "SELECT COUNT(*) AS jumlah FROM kurir";
        $query = koneksi()->query($sql);
        $hasilQuery =  $query->fetch_assoc();
        $jumlah = $hasilQuery['jumlah'];
        return $jumlah;
    }

    public function getDataKurir($idKurir)
    {
        $sql = "SELECT * FROM kurir WHERE id_kurir = $idKurir";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesStoreKurir($jasaKurir, $biaya)
    {
        $sql = "INSERT INTO kurir(jasa_kurir, biaya_jasa_kurir) VALUES('$jasaKurir', $biaya)";
        koneksi()->query($sql);
    }

    public function prosesUpdateKurir($idKurir, $jasaKurir, $biaya)
    {
        $sql = "UPDATE kurir SET 
                    jasa_kurir = '$jasaKurir',
                    biaya_jasa_kurir = $biaya
                WHERE id_kurir = $idKurir";
        koneksi()->query($sql);
    }

    public function prosesFilterHargaKurir($sort)
    {
        $sql = "SELECT * FROM kurir ORDER BY biaya_jasa_kurir $sort";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
=======
    public function prosesStoreKurir($idKurir,$jasaKurir)
    {
        $jasaKurir = $_POST['jasa_kurir'];
        $sql = "INSERT INTO kurir(id_kurir,jasa_kurir) VALUES('$idKurir','$jasaKurir')";
        return koneksi()->query($sql);
    }

    public function prosesKurir($idKurir, $jasaKurir)
    {
        $sql = "UPDATE kurir SET jasa_kurir='$jasakurir' WHERE id_kurir = $idKurir";
        $query = koneksi()->query($sql);
        return $query;
>>>>>>> 7034e355617db2ecce6a083066c9bc228d8b848b
    }
}

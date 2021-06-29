<?php

class StatusModel
{
    public function getStatus()
    {
        $sql = "SELECT * FROM status_pembelian";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

<<<<<<< HEAD
    public function getDataStatus($idStatus)
    {
        $sql = "SELECT * FROM status_pembelian WHERE id_status_pembelian = $idStatus";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}
=======
    public function prosesStatus($idStatus, $namaStatus)
    {
        $sql = "UPDATE status_pembelian SET nama_status_pembelian='$namaStatus' WHERE id_status_pembelian = $idKategori";
        $query = koneksi()->query($sql);
        return $query;
    }
}
>>>>>>> 7034e355617db2ecce6a083066c9bc228d8b848b

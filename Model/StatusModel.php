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

    public function prosesStatus($idStatus, $namaStatus)
    {
        $sql = "UPDATE status_pembelian SET nama_status_pembelian='$namaStatus' WHERE id_status_pembelian = $idKategori";
        $query = koneksi()->query($sql);
        return $query;
    }
}
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

    public function getDataStatus($idStatus)
    {
        $sql = "SELECT * FROM status_pembelian WHERE id_status_pembelian = $idStatus";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}

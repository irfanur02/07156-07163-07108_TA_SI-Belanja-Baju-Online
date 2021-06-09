<?php

class TransaksiModel
{
    /**
     * berfungsi untuk mendapatkan data trasanksi berdasarkan user
     */
    public function getDataTransaksi($id_user)
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, tr.tanggal_transaksi AS tanggalTransaksi, SUM((ba.harga_baju * dt.jumlah_pembelian) + (ku.biaya_jasa_kurir * tr.jarak_pengiriman)) AS totalPembelian, SUM(ku.biaya_jasa_kurir * tr.jarak_pengiriman) AS biayaPengiriman, SUM(ba.harga_baju * dt.jumlah_pembelian) AS totalHarga, CONCAT_WS(', ', ou.alamat, ko.nama_kota) AS alamatPengiriman, tr.jarak_pengiriman AS jarakPengiriman, ku.jasa_kurir AS jasaKurir
        FROM transaksi tr 
        JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
        JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
        JOIN kurir ku ON tr.id_kurir = ku.id_kurir 
        JOIN users us ON tr.id_user= us.id_user 
        JOIN owner_user ou ON us.id_user = ou.id_user 
        JOIN kota ko ON ou.id_kota = ko.id_kota 
        JOIN baju ba ON dt.id_baju = ba.id_baju 
        WHERE us.id_user = $id_user AND sp.nama_status_pembelian = 'Diterima' GROUP BY tr.id_transaksi ORDER BY tr.id_transaksi DESC";

        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan detail data transaksi berdasarkan user
     */
    public function getDetailDataTransaksi($id_user)
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, ba.gambar_baju AS gambarBaju, CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, ba.harga_baju AS hargaBaju, dt.jumlah_pembelian AS jumlahBaju, ba.harga_baju * dt.jumlah_pembelian AS totalHarga 
        FROM transaksi tr 
        LEFT JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
        JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
        JOIN users us ON tr.id_user= us.id_user 
        JOIN baju ba ON dt.id_baju = ba.id_baju 
        JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
        JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
        WHERE us.id_user = $id_user AND sp.nama_status_pembelian = 'Diterima' ORDER BY tr.id_transaksi DESC, namaProduk ASC";

        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }
}

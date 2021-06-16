<?php

class ProdukModel
{

    /**
     * berfungsi untuk mendapatkan seluruh produk
     */
    public function getSeluruhBaju()
    {
        $sql = "SELECT ba.id_baju AS idBaju, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, 
                    ba.deskripsi_baju AS detailProduk, sb.jumlah_baju AS stokBaju, ba.harga_baju AS hargaBaju
                FROM baju ba
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju
                ORDER BY ba.id_baju ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     *  berfungsi untuk mendapatkan produk populer dengan batasan yang ditentukan
     */
    public function getBajuPopuler($limit)
    {
        $sql = "SELECT ba.id_baju AS idBaju, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, ba.deskripsi_baju AS detailProduk, 
                    sb.jumlah_baju AS stokBaju, ba.harga_baju AS hargaBaju, tr.id_user AS idUser, COUNT(dt.id_baju) AS jumlahBaju 
                FROM baju ba 
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                JOIN detail_transaksi dt ON ba.id_baju = dt.id_baju 
                JOIN transaksi tr ON dt.id_transaksi = tr.id_transaksi 
                WHERE tr.tanggal_transaksi IS NOT NULL GROUP BY ba.id_baju ORDER BY COUNT(dt.id_baju) DESC LIMIT $limit";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }
}

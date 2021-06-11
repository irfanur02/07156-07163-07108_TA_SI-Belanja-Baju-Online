<?php

class TransaksiModel
{
    /**
     * berfungsi untuk mendapatkan data trasanksi berdasarkan id user
     */
    public function getDataTransaksi($idUser, $statusPembelian)
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, tr.tanggal_transaksi AS tanggalTransaksi, SUM((ba.harga_baju * dt.jumlah_pembelian) + (ku.biaya_jasa_kurir * tr.jarak_pengiriman)) AS totalPembelian, SUM(ku.biaya_jasa_kurir * tr.jarak_pengiriman) AS biayaPengiriman, SUM(ba.harga_baju * dt.jumlah_pembelian) AS totalHarga, CONCAT_WS(', ', ou.alamat, ko.nama_kota) AS alamatPengiriman, tr.jarak_pengiriman AS jarakPengiriman, ku.jasa_kurir AS jasaKurir, sp.id_status_pembelian AS idStatusPembelian
        FROM transaksi tr 
        JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
        JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
        JOIN kurir ku ON tr.id_kurir = ku.id_kurir 
        JOIN users us ON tr.id_user= us.id_user 
        JOIN owner_user ou ON us.id_user = ou.id_user 
        JOIN kota ko ON ou.id_kota = ko.id_kota 
        JOIN baju ba ON dt.id_baju = ba.id_baju 
        WHERE us.id_user = $idUser AND sp.nama_status_pembelian = '$statusPembelian' GROUP BY tr.id_transaksi ORDER BY tr.tanggal_transaksi DESC";

        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan detail data transaksi berdasarkan id user
     */
    public function getDetailDataTransaksi($idUser, $statusPembelian)
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, ba.gambar_baju AS gambarBaju, CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, ba.harga_baju AS hargaBaju, ba.deskripsi_baju AS detailProduk, dt.jumlah_pembelian AS jumlahBaju, ba.harga_baju * dt.jumlah_pembelian AS totalHarga 
        FROM transaksi tr 
        JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
        JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
        JOIN users us ON tr.id_user= us.id_user 
        JOIN baju ba ON dt.id_baju = ba.id_baju 
        JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
        JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
        WHERE us.id_user = $idUser AND sp.nama_status_pembelian = '$statusPembelian' ORDER BY tr.id_transaksi DESC, namaProduk ASC";

        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mengupdate status pembelian berdasarkan id transaksi
     */
    public function prosesUpdatePembelian($idTransaksi)
    {
        $sql = "UPDATE transaksi SET id_status_pembelian = 4 WHERE id_transaksi = $idTransaksi";
        koneksi()->query($sql);
    }

    /**
     * berfungsi untuk menampilkan produk yang telah ada dalam keranjang berdasarkan id user
     */
    public function getDataKeranjang($idUser)
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, dt.id_baju AS idBaju, ba.gambar_baju AS gambarBaju,
                        CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, 
                        ba.deskripsi_baju AS detailProduk, sb.jumlah_baju AS jumlahBaju, ba.harga_baju AS hargaBaju, dt.jumlah_pembelian AS jumlahPembelian
                FROM transaksi tr
                JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi
                JOIN baju ba ON dt.id_baju = ba.id_baju
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju
                WHERE tr.id_user = $idUser AND sp.nama_status_pembelian = 'Keranjang'";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk menghapus data produk yang ada dalam keranjang berdasarkan id transaksi dan id baju
     */
    public function prosesDeleteKeranjang($idTransaksi, $idBaju)
    {
        $sql = "DELETE FROM detail_transaksi
                WHERE id_transaksi = $idTransaksi AND id_baju = $idBaju";
        koneksi()->query($sql);
    }

    /**
     * berfungsi untuk mengupdate jumlah pembelian produk yang ada dalam keranjang berdasarkan id transaksi dan id baju
     */
    public function updateCheckout($idTransaksi, $idBaju, $jumlahPembelian)
    {
        $sql = "UPDATE detail_transaksi 
                SET jumlah_pembelian = $jumlahPembelian
                WHERE id_transaksi = $idTransaksi AND id_baju = $idBaju";
        koneksi()->query($sql);
    }

    /**
     * berfungsi untuk menampilkan data produk yang sudah di checkout berdasarkan id user
     */
    public function getDataCheckout($idUser)
    {
        $sql = "SELECT CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, 
                ba.gambar_baju AS gambarBaju, ba.deskripsi_baju AS detailProduk, ba.harga_baju AS hargaBaju, 
                dt.jumlah_pembelian AS jumlahPembelian, ba.harga_baju * dt.jumlah_pembelian AS totalHarga 
                FROM transaksi tr 
                JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
                JOIN baju ba ON dt.id_baju = ba.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                WHERE sp.nama_status_pembelian = 'Keranjang' AND tr.id_user = $idUser";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan seluruh total harga produk pada view transaksi berdasarkan id user
     */
    public function getTotalHargaDataCheckout($idUser)
    {
        $sql = "SELECT SUM(ba.harga_baju * dt.jumlah_pembelian) AS totalHarga 
                FROM transaksi tr 
                JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
                JOIN baju ba ON dt.id_baju = ba.id_baju 
                WHERE sp.nama_status_pembelian = 'Keranjang' AND tr.id_user = $idUser GROUP BY tr.id_user";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungisi untuk memasukkan data transaksi dengan mengupdate data transaksi yang status pembeliannya keranjang menjadi proses
     */
    public function prosesUpdate($idUser, $tanggalWaktu, $jarak, $idKurir)
    {
        $sql = "UPDATE transaksi SET tanggal_transaksi = '$tanggalWaktu', 
                                    jarak_pengiriman = $jarak, 
                                    id_kurir = $idKurir, 
                                    id_status_pembelian = 2
                WHERE id_user = $idUser AND id_status_pembelian = 1";
        koneksi()->query($sql);
    }
}

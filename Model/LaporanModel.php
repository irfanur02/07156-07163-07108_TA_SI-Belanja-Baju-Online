<?php

class LaporanModel
{
    /**
     * berfungsi untuk mendaptakan semua laporan dan status trasakasi berdasarkan user
     */
    public function getLaporanTiapUser()
    {
        $sql = "SELECT tr.id_user AS idUser, us.username AS namaUser, COUNT(tr.id_user) AS jumlahTransaksi, 
                    (SELECT COUNT(id_status_pembelian) FROM transaksi WHERE id_status_pembelian = 4 AND id_user = idUser) AS diterima,
                    (SELECT COUNT(id_status_pembelian) FROM transaksi WHERE id_status_pembelian = 3 AND id_user = idUser) AS dikirim,
                    (SELECT COUNT(id_status_pembelian) FROM transaksi WHERE id_status_pembelian = 2 AND id_user = idUser) AS diproses
                FROM transaksi tr
                JOIN users us ON tr.id_user = us.id_user
                WHERE tr.tanggal_transaksi IS NOT NULL GROUP by tr.id_user ORDER BY us.username ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua laporan dan status transaksi berdasarkan user dan diurukan berdasarkan jumlah transaksi terbanyak
     */
    public function getLaporanTiapUserByTransaksiTerbanyak()
    {
        $sql = "SELECT tr.id_user AS idUser, us.username AS namaUser, COUNT(tr.id_user) AS jumlahTransaksi, 
                    (SELECT COUNT(id_status_pembelian) FROM transaksi WHERE id_status_pembelian = 4 AND id_user = idUser) AS diterima,
                    (SELECT COUNT(id_status_pembelian) FROM transaksi WHERE id_status_pembelian = 3 AND id_user = idUser) AS dikirim,
                    (SELECT COUNT(id_status_pembelian) FROM transaksi WHERE id_status_pembelian = 2 AND id_user = idUser) AS diproses
                FROM transaksi tr
                JOIN users us ON tr.id_user = us.id_user
                WHERE tr.tanggal_transaksi IS NOT NULL GROUP by tr.id_user ORDER BY COUNT(tr.id_user) DESC, us.username ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan laporan berdasarkan username
     */
    public function getLaporanUser($user)
    {
        $sql = "SELECT tr.id_user AS idUser, us.username AS namaUser, COUNT(tr.id_user) AS jumlahTransaksi, 
                    (SELECT COUNT(id_status_pembelian) FROM transaksi WHERE id_status_pembelian = 4 AND id_user = idUser) AS diterima,
                    (SELECT COUNT(id_status_pembelian) FROM transaksi WHERE id_status_pembelian = 3 AND id_user = idUser) AS dikirim,
                    (SELECT COUNT(id_status_pembelian) FROM transaksi WHERE id_status_pembelian = 2 AND id_user = idUser) AS diproses
                FROM transaksi tr
                JOIN users us ON tr.id_user = us.id_user
                WHERE us.username LIKE '%$user%' AND tr.tanggal_transaksi IS NOT NULL GROUP by tr.id_user";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan laporan user berdasarkan id user dan status transaksi
     */
    public function getLaporanTransaksiUser($idUser, $statusTransaksi)
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, tr.tanggal_transaksi AS tanggalTransaksi, 
                    SUM(ba.harga_baju * dt.jumlah_pembelian) AS totalHargaPembelian,
                    CONCAT_WS(', ', ou.alamat, ko.nama_kota) AS alamatPengiriman, tr.jarak_pengiriman AS jarak, ku.jasa_kurir AS jasaKurir,
                    ku.biaya_jasa_kurir AS biayaKurir, ku.biaya_jasa_kurir * tr.jarak_pengiriman AS biayaPengiriman,
                    SUM(ba.harga_baju * dt.jumlah_pembelian) + (ku.biaya_jasa_kurir * tr.jarak_pengiriman) AS totalHarga
                FROM transaksi tr 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
                JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian
                JOIN baju ba ON dt.id_baju = ba.id_baju
                JOIN kurir ku ON tr.id_kurir = ku.id_kurir 
                JOIN users us ON tr.id_user= us.id_user
                JOIN owner_user ou ON us.id_user = ou.id_user 
                JOIN kota ko ON ou.id_kota = ko.id_kota
                WHERE tr.id_user = $idUser AND sp.nama_status_pembelian = '$statusTransaksi' GROUP BY LEFT(tr.tanggal_transaksi, 10)";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan detail laporan berdasarkan id user dan status transkasi
     */
    public function getDetailLaporanTransaksiUser($idUser, $statusTransaksi)
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, ba.harga_baju AS hargaBaju, dt.jumlah_pembelian AS jumlahBaju, ba.harga_baju * dt.jumlah_pembelian AS totalHarga 
                FROM transaksi tr 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
                JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
                JOIN users us ON tr.id_user= us.id_user 
                JOIN baju ba ON dt.id_baju = ba.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                WHERE us.id_user = $idUser AND sp.nama_status_pembelian = '$statusTransaksi' ORDER BY tr.id_transaksi DESC, namaProduk ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendaptakan seluruh laporan berdasarkan tanggal
     */
    public function getSeluruhLaporanByTanggal()
    {
        $sql = "SELECT tr.tanggal_transaksi AS tanggalTransaksi, COUNT(tr.id_user) AS jumlahTransaksi
                FROM transaksi tr 
                WHERE tr.tanggal_transaksi IS NOT NULL GROUP BY LEFT(tr.tanggal_transaksi, 10) ORDER BY tr.tanggal_transaksi ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatka laporan berdasarkan range tanggal dan diurutkan secara descending
     */
    public function getSeluruhLaporanSortJumlahTransaksiDesc()
    {
        $sql = "SELECT tr.tanggal_transaksi AS tanggalTransaksi, COUNT(tr.id_user) AS jumlahTransaksi
                FROM transaksi tr 
                WHERE tr.tanggal_transaksi IS NOT NULL GROUP BY LEFT(tr.tanggal_transaksi, 10) ORDER BY COUNT(tr.id_user) DESC, tr.tanggal_transaksi ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan laporan berdasarkan range tanggal
     */
    public function getSeluruhLaporanByRangeTanggal($tglAwal, $tglAkhir)
    {
        $sql = "SELECT tr.tanggal_transaksi AS tanggalTransaksi, COUNT(tr.id_user) AS jumlahTransaksi
                FROM transaksi tr 
                WHERE LEFT(tr.tanggal_transaksi, 10) BETWEEN '$tglAwal' AND '$tglAkhir' GROUP BY LEFT(tr.tanggal_transaksi, 10) ORDER BY tr.tanggal_transaksi ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan laporan berdasarkan range tanggal dan diurutkan berdasarkan jumlah transaksi terbanyak
     */
    public function getSeluruhLaporanByRangeTanggalSortJumlahTransaksiDesc($tglAwal, $tglAkhir)
    {
        $sql = "SELECT tr.tanggal_transaksi AS tanggalTransaksi, COUNT(tr.id_user) AS jumlahTransaksi
                FROM transaksi tr 
                WHERE LEFT(tr.tanggal_transaksi, 10) BETWEEN '$tglAwal' AND '$tglAkhir' GROUP BY LEFT(tr.tanggal_transaksi, 10) ORDER BY COUNT(tr.id_user) DESC, tr.tanggal_transaksi ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan laporan berdarakan tanggal
     */
    public function getLaporanByTanggal($tanggal)
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, RIGHT(tr.tanggal_transaksi, 8) AS tanggalTransaksi, us.username AS username, 
                    ou.nama AS nama, CONCAT_WS(', ', ou.alamat, ko.nama_kota) AS alamatPengiriman, tr.jarak_pengiriman AS jarak, 
                    ku.jasa_kurir AS jasaKurir, ku.biaya_jasa_kurir AS biayaKurir, ku.biaya_jasa_kurir * tr.jarak_pengiriman AS biayaPengiriman,
                    (
                        SELECT SUM(ba.harga_baju * dt.jumlah_pembelian) 
                        FROM detail_transaksi dt 
                        JOIN baju ba ON dt.id_baju = ba.id_baju
                        WHERE dt.id_transaksi = idTransaksi
                    ) AS totalHargaPembelian,
                    (
                        SELECT SUM(totalHargaPembelian + biayaPengiriman)
                    ) AS totalHarga,
                    sp.nama_status_pembelian AS statusTransaksi
                FROM transaksi tr 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
                JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian
                JOIN baju ba ON dt.id_baju = ba.id_baju
                JOIN kurir ku ON tr.id_kurir = ku.id_kurir 
                JOIN users us ON tr.id_user= us.id_user
                JOIN owner_user ou ON us.id_user = ou.id_user 
                JOIN kota ko ON ou.id_kota = ko.id_kota
                WHERE tr.tanggal_transaksi LIKE '$tanggal%' GROUP BY dt.id_transaksi ORDER BY RIGHT(tr.tanggal_transaksi, 8) ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan detail laporan berdasarkan tanggal
     */
    public function getDetailLaporanByTanggal($tanggal)
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, ba.harga_baju AS hargaBaju, 
                    dt.jumlah_pembelian AS jumlahBaju, ba.harga_baju * dt.jumlah_pembelian AS totalHarga
                FROM transaksi tr 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
                JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
                JOIN users us ON tr.id_user= us.id_user JOIN baju ba ON dt.id_baju = ba.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                WHERE tr.tanggal_transaksi LIKE '$tanggal%' IS NOT NULL ORDER BY CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }
}

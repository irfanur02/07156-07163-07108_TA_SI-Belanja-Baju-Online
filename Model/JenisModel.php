<?php

class JenisModel
{

    /**
     * berfungsi untuk mendapatkan semua jenis baju yang sering dibeli
     */
    public function getAllJenisTerpopuler()
    {
        $sql = "SELECT jb.nama_jenis_baju as namaJenis, 
                    (SUM(dt.jumlah_pembelian) + COUNT(jb.id_jenis_baju)) AS jumlah 
                FROM transaksi tr 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
                JOIN baju ba ON dt.id_baju = ba.id_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                WHERE tr.tanggal_transaksi IS NOT NULL GROUP BY jb.id_jenis_baju ORDER BY jumlah DESC, namaJenis ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua jenis produk
     */
    public function getAllJenisBaju()
    {
        $sql = "SELECT id_jenis_baju AS idJenisBaju, nama_jenis_baju AS jenisBaju FROM jenis_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua jenis produk yang ada di produk
     */
    public function getAllJenisBajuAktif()
    {
        $sql = "SELECT DISTINCT jb.id_jenis_baju AS idJenisBaju, jb.nama_jenis_baju AS jenisBaju 
                FROM jenis_baju jb 
                JOIN baju ba ON jb.id_jenis_baju = ba.id_jenis_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan jenis produk berdasarkan pencarian
     */
    public function getJenisBaju($pencarian)
    {
        $sql = "SELECT * FROM jenis_baju WHERE nama_jenis_baju LIKE '%$pencarian%'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getJumlahJenis()
    {
        $sql = "SELECT COUNT(*) AS jumlah FROM jenis_baju";
        $query = koneksi()->query($sql);
        $hasilQuery =  $query->fetch_assoc();
        $jumlah = $hasilQuery['jumlah'];
        return $jumlah;
    }

    public function getDataJenisBaju($idJenis)
    {
        $sql = "SELECT * FROM jenis_baju WHERE id_jenis_baju = $idJenis";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesStore($namaJenis)
    {
        $sql = "INSERT INTO jenis_baju(nama_jenis_baju) VALUES('$namaJenis')";
        koneksi()->query($sql);
    }

    public function prosesUpdate($idJenis, $namaJenis)
    {
        $sql = "UPDATE jenis_baju SET nama_jenis_baju = '$namaJenis' WHERE id_jenis_baju = $idJenis";
        koneksi()->query($sql);
    }
}

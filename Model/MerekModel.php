<?php

class MerekModel
{

    /**
     * berfungsi untuk mendapatkan semua merek baju yang sering dibeli
     */
    public function getAllMerekTerpopuler()
    {
        $sql = "SELECT mb.nama_merek_baju as namaMerek, 
                    (SUM(dt.jumlah_pembelian) + COUNT(mb.id_merek_baju)) AS jumlah 
                FROM transaksi tr 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
                JOIN baju ba ON dt.id_baju = ba.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                WHERE tr.tanggal_transaksi IS NOT NULL GROUP BY mb.id_merek_baju ORDER BY jumlah DESC, namaMerek ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua merek produk
     */
    public function getAllMerekBaju()
    {
        $sql = "SELECT id_merek_baju AS idMerekBaju, nama_merek_baju AS merekBaju FROM merek_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua merek produk yang ada di produk
     */
    public function getAllMerekBajuAktif()
    {
        $sql = "SELECT DISTINCT mb.id_merek_baju AS idMerekBaju, mb.nama_merek_baju AS merekBaju 
                FROM merek_baju mb 
                JOIN baju ba ON mb.id_merek_baju = ba.id_merek_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan merek produk berdasarkan pencarian
     */
    public function getMerekBaju($pencarian)
    {
        $sql = "SELECT * FROM merek_baju WHERE nama_merek_baju LIKE '%$pencarian%'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getJumlahMerek()
    {
        $sql = "SELECT COUNT(*) AS jumlah FROM merek_baju";
        $query = koneksi()->query($sql);
        $hasilQuery =  $query->fetch_assoc();
        $jumlah = $hasilQuery['jumlah'];
        return $jumlah;
    }

    public function getDataMerekBaju($idMerek)
    {
        $sql = "SELECT * FROM merek_baju WHERE id_merek_baju = $idMerek";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesStoreMerek($namaMerek)
    {
        $sql = "INSERT INTO merek_baju(nama_merek_baju) VALUES('$namaMerek')";
        koneksi()->query($sql);
    }

    public function prosesUpdateMerek($idMerek, $namaMerek)
    {
        $sql = "UPDATE merek_baju SET nama_merek_baju = '$namaMerek' WHERE id_merek_baju = $idMerek";
        koneksi()->query($sql);
    }
}

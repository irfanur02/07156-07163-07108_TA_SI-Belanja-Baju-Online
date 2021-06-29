<?php

class KategoriModel
{

    /**
     * berfungsi untuk mendapatkan jumlah kategori baju
     */
    public function getJumlahKategori()
    {
        $sql = "SELECT kb.nama_kategori_baju as namaKategori, 
                    COUNT(ba.id_kategori_baju) AS jumlah
                FROM baju ba 
                JOIN kategori_baju kb ON ba.id_kategori_baju = kb.id_kategori_baju 
                GROUP BY ba.id_kategori_baju ORDER BY jumlah DESC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua kategori produk
     */
    public function getAllKategoriBaju()
    {
        $sql = "SELECT id_kategori_baju AS idKategoriBaju, nama_kategori_baju AS kategoriBaju FROM kategori_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua kategori produk yang ada di produk
     */
    public function getAllKategoriBajuAktif()
    {
        $sql = "SELECT DISTINCT kb.id_kategori_baju AS idKategoriBaju, kb.nama_kategori_baju AS kategoriBaju 
                FROM kategori_baju kb 
                JOIN baju ba ON kb.id_kategori_baju = ba.id_kategori_baju";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan kategori produk berdasarkan pencarian
     */
    public function getKategoriBaju($pencarian)
    {
        $sql = "SELECT * FROM kategori_baju WHERE nama_kategori_baju LIKE '%$pencarian%'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

<<<<<<< HEAD
    public function getJumlahDataKategori()
    {
        $sql = "SELECT COUNT(*) AS jumlah FROM kategori_baju";
        $query = koneksi()->query($sql);
        $hasilQuery =  $query->fetch_assoc();
        $jumlah = $hasilQuery['jumlah'];
        return $jumlah;
    }

    public function getDataKategori($idKategori)
    {
        $sql = "SELECT * FROM kategori_baju WHERE id_kategori_baju = $idKategori";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getAllKategori()
    {
        $sql = "SELECT * FROM kategori_baju ORDER BY nama_kategori_baju ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function prosesStoreKategori($namaKategori)
    {
        $sql = "INSERT INTO kategori_baju(nama_kategori_baju) VALUES('$namaKategori')";
        koneksi()->query($sql);
    }

    public function prosesUpdataKategori($idKategori, $namaKategori)
    {
        $sql = "UPDATE kategori_baju SET 
                        nama_kategori_baju = '$namaKategori' 
                WHERE id_kategori_baju = $idKategori";
        koneksi()->query($sql);
=======
    public function prosesStoreKategori($idKategori,$namaKategori)
    {
        $namaKategori = $_POST['nama_kategori_baju'];
        $sql = "INSERT INTO kategori_baju(id_kategori_baju,nama_kategori_baju) VALUES('$idJenis','$namaKategori')";
        return koneksi()->query($sql);
    }

    public function prosesKategori($idKategori, $namaKategori)
    {
        $sql = "UPDATE kategori_baju SET nama_kategori_baju='$namaKategori' WHERE id_jenis_baju = $idKategori";
        $query = koneksi()->query($sql);
        return $query;
>>>>>>> 7034e355617db2ecce6a083066c9bc228d8b848b
    }
}

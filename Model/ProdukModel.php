<?php

class ProdukModel
{

    /**
     *  berfungsi untuk mendapatkan semua baju dan jumlah baju favorite
     */
    public function getAllBajuFavorite()
    {
        $sql = "SELECT ba.id_baju AS idBaju, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, 
                    ba.deskripsi_baju AS detailProduk, sb.jumlah_baju AS stokBaju, ba.harga_baju AS hargaBaju, (SELECT COUNT(id_baju) FROM wishlist WHERE id_baju = idBaju GROUP BY id_baju) AS jumlahDisukai 
                FROM baju ba 
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                LEFT JOIN wishlist wi ON ba.id_baju = wi.id_baju 
                GROUP BY ba.id_baju ORDER BY ba.id_baju ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua baju yang disimpan
     */
    public function getAllBajuFavoriteTerbanyak()
    {
        $sql = "SELECT ba.id_baju AS idBaju, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, 
                    ba.deskripsi_baju AS detailProduk, sb.jumlah_baju AS stokBaju, ba.harga_baju AS hargaBaju, (SELECT COUNT(id_baju) FROM wishlist WHERE id_baju = idBaju GROUP BY id_baju) AS jumlahDisukai 
                FROM wishlist wi 
                LEFT JOIN baju ba ON wi.id_baju = ba.id_baju 
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                GROUP BY ba.id_baju ORDER BY jumlahDisukai DESC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan jumlah seluruh baju
     */
    public function getJumlahBaju()
    {
        $sql = "SELECT COUNT(*) AS jumlahBaju FROM baju";
        $query = koneksi()->query($sql);
        $hasilQuery = $query->fetch_assoc();
        $jumlah = $hasilQuery['jumlahBaju'];
        return $jumlah;
    }

    /**
     *  berfungsi untuk mendapatkan hasil pencarian filter produk berdasarkan merek, jenis, kategori diurutkan berdasarkan harga
     */
    public function getAllPencarianFilterBajuByHarga($merek, $jenis, $kategori, $ukuran, $harga)
    {
        $sql = "SELECT ba.id_baju AS idBaju, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, ba.deskripsi_baju AS detailProduk, 
                    sb.jumlah_baju AS stokBaju, ba.harga_baju AS hargaBaju,
                    (SELECT COUNT(id_baju) FROM wishlist WHERE id_baju = idBaju GROUP BY id_baju) AS jumlahDisukai
                FROM baju ba 
                JOIN ukuran_baju ub ON ba.id_ukuran_baju = ub.id_ukuran_baju 
                JOIN kategori_baju kb ON ba.id_kategori_baju = kb.id_kategori_baju 
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju
                LEFT JOIN wishlist wi ON ba.id_baju = wi.id_baju
                WHERE mb.nama_merek_baju LIKE '%$merek%' AND jb.nama_jenis_baju LIKE '%$jenis%' AND kb.nama_kategori_baju LIKE '%$kategori%' AND ub.satuan_ukuran_baju LIKE '%$ukuran%' GROUP BY ba.id_baju ORDER BY ba.harga_baju $harga";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     *  berfungsi untuk mendapatkan hasil pencarian filter produk berdasarkan merek, jenis, kategori, ukuran
     */
    public function getAdminAllPencarianFilterBaju($merek, $jenis, $kategori, $ukuran)
    {
        $sql = "SELECT ba.id_baju AS idBaju, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, ba.deskripsi_baju AS detailProduk, 
                    sb.jumlah_baju AS stokBaju, ba.harga_baju AS hargaBaju,
                    (SELECT COUNT(id_baju) FROM wishlist WHERE id_baju = idBaju GROUP BY id_baju) AS jumlahDisukai
                FROM baju ba 
                JOIN ukuran_baju ub ON ba.id_ukuran_baju = ub.id_ukuran_baju 
                JOIN kategori_baju kb ON ba.id_kategori_baju = kb.id_kategori_baju 
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                LEFT JOIN wishlist wi ON ba.id_baju = wi.id_baju
                WHERE mb.nama_merek_baju LIKE '%$merek%' AND jb.nama_jenis_baju LIKE '%$jenis%' AND kb.nama_kategori_baju LIKE '%$kategori%' AND ub.satuan_ukuran_baju LIKE '%$ukuran%' GROUP BY ba.id_baju ORDER BY ba.id_baju ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk proses tambah baju berdasarkan data pada form
     */
    public function prosesStore($jenis, $kategori, $merek, $ukuran, $deskripsi, $stok, $harga, $namaFileBaru)
    {
        $sqlInsertBaju = "INSERT INTO baju(id_kategori_baju, id_ukuran_baju, id_jenis_baju, id_merek_baju, deskripsi_baju, harga_baju, gambar_baju) 
                VALUES($kategori, $ukuran, $jenis, $merek, '$deskripsi', $harga, '$namaFileBaru')";
        koneksi()->query($sqlInsertBaju);
        $sqlGetCurrentIdBaju = "SELECT MAX(id_baju) AS idBaju FROM baju";
        $query = koneksi()->query($sqlGetCurrentIdBaju);
        $hasilQuery = $query->fetch_assoc();
        $idBaju = $hasilQuery['idBaju'];
        $sqlInsertStok = "INSERT INTO stok_baju(id_baju, jumlah_baju) VALUES($idBaju, $stok)";
        koneksi()->query($sqlInsertStok);
    }

    /**
     * berfungsi untuk mendapatkan data baju berdasarkan id baju
     */
    public function getDataBaju($idBaju)
    {
        $sql = "SELECT * FROM baju ba JOIN stok_baju sb ON ba.id_baju = sb.id_baju WHERE ba.id_baju = $idBaju";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * berfungsi untuk proses update baju atau stok berdasarkan data pada form
     */
    public function prosesUpdate($idBaju, $jenis, $kategori, $merek, $ukuran, $deskripsi, $stok, $harga, $namaFileBaru)
    {
        $sqlUpdateBaju = "UPDATE baju SET
                            id_jenis_baju = $jenis,
                            id_kategori_baju = $kategori,
                            id_merek_baju = $merek,
                            id_ukuran_baju = $ukuran,
                            deskripsi_baju = '$deskripsi',
                            harga_baju = $harga,
                            gambar_baju = '$namaFileBaru'
                            WHERE id_baju = $idBaju";
        koneksi()->query($sqlUpdateBaju);
        $sqlUpdateStokBaju = "UPDATE stok_baju SET jumlah_baju = $stok WHERE id_baju = $idBaju";
        koneksi()->query($sqlUpdateStokBaju);
    }

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
     * berfungsi untuk mendapatkan semua baju yang populer
     */
    public function getAllBajuPopuler()
    {
        $sql = "SELECT ba.id_baju AS idBaju, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, 
                    ba.deskripsi_baju AS detailProduk, sb.jumlah_baju AS stokBaju, ba.harga_baju AS hargaBaju, (SELECT COUNT(id_baju) FROM wishlist WHERE id_baju = idBaju GROUP BY id_baju) AS jumlahDisukai 
                FROM baju ba 
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                LEFT JOIN wishlist wi ON ba.id_baju = wi.id_baju 
                JOIN detail_transaksi dt ON ba.id_baju = dt.id_baju 
                JOIN transaksi tr ON dt.id_transaksi = tr.id_transaksi 
                WHERE tr.tanggal_transaksi IS NOT NULL GROUP BY ba.id_baju ORDER BY COUNT(dt.id_baju) DESC, ba.id_baju ASC";
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

    /**
     *  berfungsi untuk mendapatkan hasil pencarian produk berdasarkan merek, jenis, kategori, deskripsi baju
     */
    public function getAllPencarianBaju($merek, $jenis, $kategori, $deskripsi)
    {
        $sql = "SELECT ba.id_baju AS idBaju, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, 
                    ba.deskripsi_baju AS detailProduk, sb.jumlah_baju AS stokBaju, ba.harga_baju AS hargaBaju,(SELECT COUNT(id_baju) FROM wishlist WHERE id_baju = idBaju GROUP BY id_baju) AS jumlahDisukai
                FROM baju ba
                JOIN kategori_baju kb ON ba.id_kategori_baju = kb.id_kategori_baju
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju
                LEFT JOIN wishlist wi ON ba.id_baju = wi.id_baju
                WHERE ba.deskripsi_baju LIKE '%$deskripsi%' AND mb.nama_merek_baju LIKE '%$merek%' AND jb.nama_jenis_baju LIKE '%$jenis%' AND kb.nama_kategori_baju LIKE '%$kategori%' GROUP BY ba.id_baju ORDER BY ba.id_baju ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     *  berfungsi untuk mendapatkan hasil pencarian filter produk berdasarkan merek, jenis, kategori, deskripsi, serta harga minimal dan maksimal baju
     */
    public function getAllPencarianFilterBaju($merek, $jenis, $kategori, $ukuran, $hargaMin, $hargaMax)
    {
        $sql = "SELECT ba.id_baju AS idBaju, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, ba.deskripsi_baju AS detailProduk, 
                    sb.jumlah_baju AS stokBaju, ba.harga_baju AS hargaBaju 
                FROM baju ba 
                JOIN ukuran_baju ub ON ba.id_ukuran_baju = ub.id_ukuran_baju 
                JOIN kategori_baju kb ON ba.id_kategori_baju = kb.id_kategori_baju 
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                WHERE mb.nama_merek_baju LIKE '%$merek%' AND jb.nama_jenis_baju LIKE '%$jenis%' AND kb.nama_kategori_baju LIKE '%$kategori%' AND ub.satuan_ukuran_baju LIKE '%$ukuran%' AND ba.harga_baju BETWEEN $hargaMin AND $hargaMax ORDER BY ba.id_baju ASC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     *  berfungsi untuk mendapatkan hasil pencarian filter produk populer berdasarkan merek, jenis, kategori, deskripsi, serta harga minimal dan maksimal baju
     */
    public function getAllPencarianFilterBajuPopuler($merek, $jenis, $kategori, $ukuran, $hargaMin, $hargaMax)
    {
        $sql = "SELECT ba.id_baju AS idBaju, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS namaProduk, ba.deskripsi_baju AS detailProduk, 
                    sb.jumlah_baju AS stokBaju, ba.harga_baju AS hargaBaju 
                FROM baju ba 
                JOIN ukuran_baju ub ON ba.id_ukuran_baju = ub.id_ukuran_baju 
                JOIN kategori_baju kb ON ba.id_kategori_baju = kb.id_kategori_baju
                JOIN stok_baju sb ON ba.id_baju = sb.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju
                JOIN detail_transaksi dt ON ba.id_baju = dt.id_baju 
                JOIN transaksi tr ON dt.id_transaksi = tr.id_transaksi
                WHERE mb.nama_merek_baju LIKE '%$merek%' AND jb.nama_jenis_baju LIKE '%$jenis%' AND kb.nama_kategori_baju LIKE '%$kategori%' AND ub.satuan_ukuran_baju LIKE '%$ukuran%' AND ba.harga_baju BETWEEN $hargaMin AND $hargaMax AND tr.tanggal_transaksi IS NOT NULL GROUP BY ba.id_baju ORDER BY COUNT(dt.id_baju) DESC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungai untuk mendapatka harga minimum produk
     */
    public function getHargaMinProduk()
    {
        $sql = "SELECT MIN(harga_baju) AS hargaMin FROM baju";
        $query  = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * berfungai untuk mendapatka harga maximun produk
     */
    public function getHargaMaxProduk()
    {
        $sql = "SELECT MAX(harga_baju) AS hargaMax FROM baju";
        $query  = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * berfungsi untuk mendapatkan deskripsi produk berdasarkan pencarian
     */
    public function getDeskripsiBaju($pencarian)
    {
        $sql = "SELECT * FROM baju WHERE deskripsi_baju LIKE '%$pencarian%'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * berfungsi untuk mengupdate stok baju berdasarkan id baju dan jumlah pembelian baju
     */
    public function updateStokBaju($idBaju, $jumlahPembelian)
    {
        $sqlGetStokBaju = "SELECT jumlah_baju AS stokBaju FROM stok_baju WHERE id_baju = $idBaju";
        $queryGetStokBaju = koneksi()->query($sqlGetStokBaju);
        $stokBaju = $queryGetStokBaju->fetch_assoc();
        $jumlahBaju = $stokBaju['stokBaju'] - $jumlahPembelian;
        $sqlUpdate = "UPDATE stok_baju SET jumlah_baju = $jumlahBaju WHERE id_baju = $idBaju";
        koneksi()->query($sqlUpdate);
    }
}

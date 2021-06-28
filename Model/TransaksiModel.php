<?php

class TransaksiModel
{

    /**
     * berfungsi untuk mendapatkan jumlah permintaan dilihat dari transaksi yang memiliki status dalam proses
     */
    public function getJumlahPermintaan()
    {
        $sql = "SELECT COUNT(tr.id_status_pembelian) AS jumlahPermintaan 
                FROM transaksi tr 
                JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
                WHERE sp.nama_status_pembelian = 'Diproses' GROUP BY tr.id_status_pembelian";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua data trasanksi yang status pembeliannya diproses
     */
    public function getAllDataTransaksiTerproses()
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, tr.tanggal_transaksi AS tanggalTransaksi, 
                    SUM((ba.harga_baju * dt.jumlah_pembelian) + (ku.biaya_jasa_kurir * tr.jarak_pengiriman)) AS totalPembelian, 
                    ou.nama AS namaPembeli, SUM(dt.jumlah_pembelian * ba.harga_baju) AS totalHargaPembelian, 
                    CONCAT_WS(', ', ou.alamat, ko.nama_kota) AS alamatPengiriman, ku.jasa_kurir AS jasaKurir, 
                    SUM(ku.biaya_jasa_kurir * tr.jarak_pengiriman) AS biayaPengiriman 
                FROM transaksi tr 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
                JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
                JOIN kurir ku ON tr.id_kurir = ku.id_kurir 
                JOIN users us ON tr.id_user= us.id_user 
                JOIN owner_user ou ON us.id_user = ou.id_user 
                JOIN kota ko ON ou.id_kota = ko.id_kota 
                JOIN baju ba ON dt.id_baju = ba.id_baju 
                WHERE sp.nama_status_pembelian = 'Diproses' GROUP BY tr.id_transaksi ORDER BY tr.tanggal_transaksi DESC";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan semua detail data transaksi yang status pembeliannya diproses
     */
    public function getAllDetailDataTransaksiTerproses()
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, ba.gambar_baju AS gambarBaju, 
                    CONCAT_WS(' ', mb.nama_merek_baju, jb.nama_jenis_baju) AS  namaProduk, ba.harga_baju AS hargaBaju, 
                    ba.deskripsi_baju AS detailProduk, dt.jumlah_pembelian AS jumlahBaju, ba.harga_baju * dt.jumlah_pembelian AS totalHarga, 
                    us.id_user AS idUser
                FROM transaksi tr 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi 
                JOIN status_pembelian sp ON tr.id_status_pembelian = sp.id_status_pembelian 
                JOIN users us ON tr.id_user= us.id_user 
                JOIN baju ba ON dt.id_baju = ba.id_baju 
                JOIN merek_baju mb ON ba.id_merek_baju = mb.id_merek_baju 
                JOIN jenis_baju jb ON ba.id_jenis_baju = jb.id_jenis_baju 
                WHERE sp.nama_status_pembelian = 'Diproses' ORDER BY tr.id_transaksi DESC, namaProduk ASC";

        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan data trasanksi berdasarkan id user
     */
    public function getDataTransaksi($idUser, $statusPembelian)
    {
        $sql = "SELECT tr.id_transaksi AS idTransaksi, tr.tanggal_transaksi AS tanggalTransaksi, 
                    SUM((ba.harga_baju * dt.jumlah_pembelian) + (ku.biaya_jasa_kurir * tr.jarak_pengiriman)) AS totalPembelian, 
                    SUM(ku.biaya_jasa_kurir * tr.jarak_pengiriman) AS biayaPengiriman, SUM(ba.harga_baju * dt.jumlah_pembelian) AS totalHargaPembelian, 
                    CONCAT_WS(', ', ou.alamat, ko.nama_kota) AS alamatPengiriman, tr.jarak_pengiriman AS jarakPengiriman, ku.jasa_kurir AS jasaKurir, 
                    sp.id_status_pembelian AS idStatusPembelian
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
     * berfungsi untuk mengupdate status transaksi berdasarkan id transaksi dan id status pembelian
     */
    public function prosesUpdateStatusTransaksi($idTransaksi, $idStatusTransaksi)
    {
        $sql = "UPDATE transaksi SET id_status_pembelian = $idStatusTransaksi WHERE id_transaksi = $idTransaksi";
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

    /**
     * berfungsi untuk mendapatkan id transaksi berdasarkan id user
     */
    public function getCurrentTransaksiUser($idUser)
    {
        $sqlGetIdTransaksi = "SELECT id_transaksi AS id FROM transaksi 
                                WHERE id_status_pembelian = 1 AND id_user = $idUser";
        $query = koneksi()->query($sqlGetIdTransaksi);
        $hasilQuery = $query->fetch_assoc();
        return $hasilQuery['id'];
    }

    /**
     * berfungsi untuk mengecek apakah user sudah ada di dalam tabel transaksi berdasarkan id user
     */
    public function cekUserTransaksi($idUser)
    {
        $sql = "SELECT * FROM transaksi WHERE id_user = $idUser AND id_status_pembelian NOT IN(1, 2, 3, 4)";
        $query = koneksi()->query($sql);
        $hasilQuery = $query->fetch_assoc();
        return $hasilQuery;
    }

    /**
     * berfungsi untuk input data transaksi dimana yang diberarti sama dengan tambah keranjang dimana berdasarkan
     * id user dan id baju
     */
    public function prosesTransaksiAwalUser($idUser, $idBaju)
    {
        $sqlInsertTranskasi = "INSERT INTO transaksi(id_status_pembelian, id_user) VALUES(1, $idUser)";
        koneksi()->query($sqlInsertTranskasi);
        $idTransaksi = $this->getCurrentTransaksiUser($idUser);
        $sqlInsertDetailTranskasi = "INSERT INTO detail_transaksi(id_transaksi, id_baju, jumlah_pembelian)
                                        VALUES('$idTransaksi', '$idBaju', 1)";
        koneksi()->query($sqlInsertDetailTranskasi);
    }

    /**
     * berfungsi untuk mendapatkan produk yang ada dikeranjang berdasarkan id user, apakah produk tersebut sudah ada di keranjang atau belum
     */
    public function cekKeranjangUser($idUser, $idBaju)
    {
        $idTransaksi = $this->getCurrentTransaksiUser($idUser);
        $sql = "SELECT * FROM detail_transaksi dt 
                JOIN transaksi tr ON dt.id_transaksi = tr.id_transaksi 
                WHERE tr.id_user = $idUser AND dt.id_baju = $idBaju AND dt.id_transaksi = $idTransaksi";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * berfungsi untuk mendapatkan data produk yang ada di keranjang berdasarkan id user
     */
    public function getKeranjang($idUser)
    {
        $sql = "SELECT dt.id_baju AS idBaju 
                FROM transaksi tr 
                JOIN detail_transaksi dt ON tr.id_transaksi = dt.id_transaksi
                WHERE tr.id_user = $idUser AND tr.id_status_pembelian = 1";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk mendapatkan jumlah keranjang berdasarkan id user
     */
    public function getJumlahKeranjangUser($idUser)
    {
        $sql = "SELECT COUNT(tr.id_status_pembelian) AS jumlahKeranjang 
                FROM detail_transaksi dt
                JOIN transaksi tr ON dt.id_transaksi = tr.id_transaksi
                WHERE tr.id_user = $idUser AND tr.id_status_pembelian = 1 GROUP BY tr.id_status_pembelian";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * berfungsi untuk mendapatkan semua transaksi yang status dalam keranjang
     */
    public function getAllPembelianTerproses()
    {
        $sql = "SELECT COUNT(tr.id_status_pembelian) AS jumlahKeranjang 
                FROM detail_transaksi dt
                JOIN transaksi tr ON dt.id_transaksi = tr.id_transaksi
                WHERE  tr.id_status_pembelian = 1 GROUP BY tr.id_status_pembelian";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * berfungsi untuk proses menyimpan data produk ke dalam keranjang dengan cara menyimpan transaksi dalam keadaan keranjang berdasarkan id user dan id baju
     */
    public function prosesStore($idUser, $idBaju)
    {
        $idTransaksi = $this->getCurrentTransaksiUser($idUser);
        $sqlstore = "INSERT INTO detail_transaksi (id_transaksi, id_baju, jumlah_pembelian) 
                        VALUES($idTransaksi, $idBaju, 1)";
        koneksi()->query($sqlstore);
    }
}

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.css">
    <title>Laporan Tiap User</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand mb-0 h1" href="index.php?view=admin&page=dashboard&aksi=view">Sistem Informasi Belanja Baju</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?view=admin&page=dashboard&aksi=view">Menu Utama</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manajemen Data
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalPilihManajemenData">Produk</button>
                        <a href="index.php?view=admin&page=statusPembelian&aksi=view" class="dropdown-item">Status Pembelian</a>
                        <a href="index.php?view=admin&page=kota&aksi=view" class="dropdown-item">Kota</a>
                        <a href="index.php?view=admin&page=kurir&aksi=view" class="dropdown-item">Kurir</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?view=admin&page=permintaan&aksi=view">Permintaan <span class="badge badge-primary">4</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?view=admin&page=laporan&aksi=view">Laporan</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="index.php?view=admin&page=auth&aksi=logout" class="btn btn-primary mr-3 my-2 my-sm-0" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a>
            </form>
        </div>
    </nav>

    <div class="container mt-5 sticky-top" style="top: 53px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <h5 class="card-header text-light bg-primary">
                <div class="row">
                    <div class="col-4">
                        <?php if ($data == "laporanTiapUser") : ?>
                            <a href="index.php?view=admin&page=laporan&aksi=transaksiByUser" class="btn btn-light float-left">Kembali</a>
                        <?php elseif ($data == "laporanByTanggal") : ?>
                            <a href="index.php?view=admin&page=laporan&aksi=semuaTransaksi" class="btn btn-light float-left">Kembali</a>
                        <?php endif; ?>
                    </div>
                    <div class="col-4">
                        Laporan</br>
                        <span class="font-weight-normal">
                            <?php if (isset($judul)) : ?>
                                <?php if ($judul == "berdasarkanUser") : ?>
                                    Berdasarkan User
                                <?php elseif ($judul == "semuaTransaksi") : ?>
                                    Semua Transaksi
                                <?php endif; ?>
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </h5>
        </div>
    </div>

    <div class="container" id="kontenLaporan" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <?php if ($data == "laporanTiapUser") : ?>
                <div class="container mb-5  w-50">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-center text-center">
                                <div class="col-3">
                                    <a href="index.php?view=admin&page=laporan&aksi=detailLaporanUserDiproses&id=<?php echo $idUser; ?>" class="btn btn-outline-primary <?php echo $btnDiproses == 'active' ? 'active' : ''; ?>">Di Proses</a>
                                </div>
                                <div class="col-3">
                                    <a href="index.php?view=admin&page=laporan&aksi=detailLaporanUserDikirim&id=<?php echo $idUser; ?>" class="btn btn-outline-primary <?php echo $btnDikirim == 'active' ? 'active' : ''; ?>">Di kirim</a>
                                </div>
                                <div class="col-3">
                                    <a href="index.php?view=admin&page=laporan&aksi=detailLaporanUserDiterima&id=<?php echo $idUser; ?>" class="btn btn-outline-primary <?php echo $btnDiterima == 'active' ? 'active' : ''; ?>" class="btn btn-outline-primary">Di Terima</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="container">
                <div class="card mb-2">
                    <div class="card-body">
                        <?php if ($data == "laporanTiapUser") : ?>
                            <span><strong>Nama : </strong><?php echo $dataUser['nama']; ?></br><strong>Email : </strong><?php echo $dataUser['email']; ?></span>
                        <?php elseif ($data == "laporanByTanggal") : ?>
                            <span><strong>Tanggal Transaksi</strong><br>
                                <?php
                                $namaBulan = "";
                                $bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                $dataTanggal = explode("-", $tanggal);
                                for ($i = 1; $i < count($bulan); $i++) {
                                    if ($dataTanggal[1] >= 10 && $dataTanggal[1] == $i) {
                                        $namaBulan = $bulan[$i];
                                        break;
                                    } elseif ($dataTanggal[1] < 10 && substr($dataTanggal[1], 1) == $i) {
                                        $namaBulan = $bulan[$i];
                                        break;
                                    }
                                }
                                echo $dataTanggal[2] . " " . $namaBulan . " " . $dataTanggal[0];
                                ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col" style="width: 5%;">No. </th>
                            <th scope="col" style="width: 10%;">
                                <?php if ($data == "laporanTiapUser") : ?>
                                    Tanggal
                                <?php elseif ($data == "laporanByTanggal") : ?>
                                    Jam
                                <?php endif; ?>
                            </th>
                            <th scope="col" style="width: 85%;">Detail Pembelian</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        <?php if (!empty($dataLaporan)) : ?>
                            <?php
                            $no = 1;
                            foreach ($dataLaporan as $rowDataLaporan) : ?>
                                <tr>
                                    <th scope="row" class="text-center align-middle"><?php echo $no++; ?>.</th>
                                    <td class="align-middle">
                                        <div class="text-center">
                                            <?php if ($data == "laporanTiapUser") : ?>
                                                <?php echo $rowDataLaporan['tanggalTransaksi']; ?>
                                            <?php elseif ($data == "laporanByTanggal") : ?>
                                                <?php echo $rowDataLaporan['tanggalTransaksi']; ?>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-8">
                                                <table class="table table-sm table-bordered">
                                                    <thead class="text-center thead-dark">
                                                        <tr>
                                                            <th scope="col" style="width: 50%;">Barang</th>
                                                            <th scope="col" style="width: 10%;">Jumah</th>
                                                            <th scope="col" style="width: 20%;">Harga</th>
                                                            <th scope="col" style="width: 20%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-light">
                                                        <?php foreach ($dataDetailLaporan as $rowDataDetailLaporan) : ?>
                                                            <?php if ($rowDataLaporan['idTransaksi'] == $rowDataDetailLaporan['idTransaksi']) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <img class="card-img-top img-thumbnail" src="<?php echo $BASE_URL; ?>/assets/img/<?php echo $rowDataDetailLaporan['gambarBaju']; ?>" style="width: 40%;" alt="Card image cap">
                                                                        <?php echo $rowDataDetailLaporan['namaProduk']; ?>
                                                                    </td>
                                                                    <td class="text-center align-middle"><?php echo $rowDataDetailLaporan['jumlahBaju']; ?></td>
                                                                    <td class="text-center align-middle">Rp. <?php echo $rowDataDetailLaporan['hargaBaju']; ?></td>
                                                                    <td class="text-center align-middle">Rp. <?php echo $rowDataDetailLaporan['totalHarga']; ?></td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <tr class="text-danger">
                                                            <th scope="col" colspan="3"><span class="float-right">Total Harga Pembelian : </span></th>
                                                            <th scope="col" class="text-center">Rp. <?php echo $rowDataLaporan['totalHargaPembelian']; ?></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <span>
                                                            <?php if ($data == "laporanByTanggal") : ?>
                                                                <strong>Status Transaksi : </strong><span class="text-danger"><?php echo $rowDataLaporan['statusTransaksi']; ?></span></br>
                                                                User : <?php echo $rowDataLaporan['username']; ?></br>
                                                                Nama : <?php echo $rowDataLaporan['nama']; ?></br>
                                                            <?php endif; ?>
                                                            Alamat : <?php echo $rowDataLaporan['alamatPengiriman']; ?></br>
                                                            Jarak : <?php echo $rowDataLaporan['jarak']; ?> km</br>
                                                            Jasa Pengiriman<br><?php echo $rowDataLaporan['jasaKurir']; ?> (Rp. <?php echo $rowDataLaporan['biayaKurir']; ?>)</br>
                                                            Biaya Pengiriman : Rp. <?php echo $rowDataLaporan['biayaPengiriman']; ?></br>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <span class="font-weight-bold">
                                                            Total Seluruh Harga<br>Rp. <?php echo $rowDataLaporan['totalHarga']; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="alert alert-light" role="alert">
                                Laporan tidak Ada!
                            </div>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- modal manajemen data -->
    <div class="modal fade bd-example-modal-sm" id="modalPilihManajemenData" tabindex="-1" role="dialog" aria-labelledby="modalLabelPilihManajemenData" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelPilihManajemenData">Manajemen Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="index.php?view=admin&page=produk&aksi=view" class="btn btn-light btn-block">Produk</a>
                    <a href="index.php?view=admin&page=jenisBaju&aksi=view" class="btn btn-light btn-block">Jenis Baju</a>
                    <a href="index.php?view=admin&page=kategoriBaju&aksi=view" class="btn btn-light btn-block">Kategori Baju</a>
                    <a href="index.php?view=admin&page=merekBaju&aksi=view" class="btn btn-light btn-block">Merek Baju</a>
                    <a href="index.php?view=admin&page=ukuranBaju&aksi=view" class="btn btn-light btn-block">Ukuran Baju</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="<?php echo $BASE_URL; ?>/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $BASE_URL; ?>/assets/js/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
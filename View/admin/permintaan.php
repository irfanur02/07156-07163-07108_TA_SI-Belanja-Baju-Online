<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Permintaan Pembeli</title>
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
                    <a class="nav-link" href="index.php?view=admin&page=permintaan&aksi=view">Permintaan <span class="badge badge-primary"><?php echo $dataJumlahPermintaan[0]['jumlahPermintaan']; ?></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?view=admin&page=laporan&aksi=view">Laporan</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="index.php?view=admin" class="btn btn-primary mr-3 my-2 my-sm-0" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a>
            </form>
        </div>
    </nav>

    <div class="container mt-5 sticky-top" style="top: 55px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <h5 class="card-header text-light bg-primary">Permintaan Pembeli</h5>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <?php if (!empty($dataTransaksi)) : ?>
                    <?php foreach ($dataTransaksi as $rowDataTransaksi) : ?>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Nama : </strong><?php echo $rowDataTransaksi['namaPembeli']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Alamat Pengiriman : </strong><?php echo $rowDataTransaksi['alamatPengiriman']; ?>
                                        <div class="float-right text-danger">
                                            <strong>Tanggal Buat Transaksi : </strong>
                                            <?php
                                            $namaBulan = "";
                                            $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                                            $data = explode(" ", $rowDataTransaksi['tanggalTransaksi']);
                                            $tanggal = explode("-", $data[0]);
                                            for ($i = 0; $i < count($bulan); $i++) {
                                                if (substr($tanggal[1], 1) == $i) {
                                                    $namaBulan = $bulan[$i];
                                                    break;
                                                }
                                            }
                                            echo $tanggal[2] . "-" . $namaBulan . "-" . $tanggal[0];
                                            ?>
                                            &nbsp;<strong>Jam : </strong>&nbsp;<?php echo $data[1]; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2 align-self-center">
                                                <p class="text-center" style="font-size: 14px;">
                                                    <mark><u>Jasa Pengiriman</u></mark></br><?php echo $rowDataTransaksi['jasaKurir']; ?></br>
                                                    <mark><u>Biaya Pengiriman</u></mark></br>Rp. <?php echo $rowDataTransaksi['biayaPengiriman']; ?></br>
                                                    <mark><u>Total Harga Pembelian</u></mark></br>Rp. <?php echo $rowDataTransaksi['totalHargaPembelian']; ?>
                                                </p>
                                                <div class="alert alert-dark" role="alert">
                                                    <p class="text-center h6">Total Seluruh Harga</br><strong>Rp. <?php echo $rowDataTransaksi['totalPembelian']; ?></strong>
                                                    </p>
                                                </div>
                                                <a href="index.php?view=admin&page=permintaan&aksi=terimaPermintaan&id=<?php echo $rowDataTransaksi['idTransaksi']; ?>" class="btn btn-success btn-block align-items-end">Kirim
                                                    Pesanan</a>
                                            </div>
                                            <div class="col-10">
                                                <div class="card-body text-dark" style="overflow-x: auto;">
                                                    <div class="row flex-row flex-nowrap">
                                                        <?php foreach ($detailDataTransaksi as $rowDetailDataTransaksi) : ?>
                                                            <?php if ($rowDetailDataTransaksi['idTransaksi'] == $rowDataTransaksi['idTransaksi']) : ?>
                                                                <div class="col-6">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col">
                                                                            <div class="card" style="height: 100%;">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-4"><img src="<?php echo $BASE_URL; ?>/assets/img/<?php echo $rowDetailDataTransaksi['gambarBaju']; ?>" class="rounded img-fluid" style="width: 100%;" alt="Image Preview"></div>
                                                                                        <div class="col-8">
                                                                                            <h5 class="card-title"><?php echo $rowDetailDataTransaksi['namaProduk']; ?>
                                                                                            </h5>
                                                                                            <p class="card-text">
                                                                                                <small><?php echo $rowDetailDataTransaksi['detailProduk']; ?>
                                                                                                </small>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row" style="height: 2rem;">
                                                                                        <div class="col text-center">
                                                                                            <blockquote class="blockquote font-weight-bold mt-2">
                                                                                                <p class="mb-0">Rp. <span class="hargaBaju"><?php echo $rowDetailDataTransaksi['hargaBaju']; ?></span></p>
                                                                                            </blockquote>
                                                                                        </div>
                                                                                        <div class="col text-center mt-2">
                                                                                            <div class="form-inline">
                                                                                                <label for="txtJumlah" class="mr-2">jumlah</label>
                                                                                                <input type="text" class="form-control form-control-sm text-center jumlahBaju" style="width: 4rem;" value="<?php echo $rowDetailDataTransaksi['jumlahBaju']; ?>" disabled>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <ul class="list-group list-group-flush">
                                                                                    <li class="list-group-item text-center bg-dark text-white">Total Harga</br><span class="font-weight-bold">Rp. <?php echo $rowDetailDataTransaksi['totalHarga']; ?></span></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="alert alert-light text-center h5" role="alert">
                        Data Permintaan masih kosong
                    </div>
                <?php endif; ?>
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
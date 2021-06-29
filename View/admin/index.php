<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.css">
    <title>Menu Utama</title>
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
                <a href="index.php?view=admin&page=auth&aksi=logout" class="btn btn-primary mr-3 my-2 my-sm-0" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a>
            </form>
        </div>
    </nav>

    <div class="container" style="margin-top: 80px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="d-flex flex-row">
                    <!-- jumlah baju -->
                    <div class="card mb-5 mr-3 text-center text-white bg-info" style="width: 100%;">
                        <h5 class="card-header">Jumlah Baju</h5>
                        <div class="card-body text-dark">
                            <div class="d-flex flex-wrap justify-content-center">
                                <?php foreach ($dataJumlahKategori as $rowDataJumlahKategori) : ?>
                                    <div class="card text-center" style="width: 8rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $rowDataJumlahKategori['namaKategori']; ?></h5>
                                            <p class="h2"><?php echo $rowDataJumlahKategori['jumlah']; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- merek baju Terpopuler -->
                    <div class="card text-center mr-3 text-white bg-primary" style="width: 100%; height: 339px;">
                        <h5 class="card-header">
                            <div class="row">
                                <div class="col-9">Merek Baju Terpopuler</div>
                                <div class="col-3">
                                    <a href="index.php?view=admin&page=merekBaju&aksi=view" class="btn-link h5 text-light float-right h6"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-body text-dark" style="overflow-y: auto;">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($dataMerekTerpopuler as $rowDataMerekTerpopuler) : ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span style="font-size: 12pt;"><?php echo $rowDataMerekTerpopuler['namaMerek']; ?></span>
                                            <span style="font-size: 14pt;"><?php echo $rowDataMerekTerpopuler['jumlah']; ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- jenis Baju Terpopuler -->
                    <div class="card text-center text-white bg-dark" style="width: 100%; height: 339px;">
                        <h5 class="card-header">
                            <div class="row">
                                <div class="col-9">Jenis Baju Terpopuler</div>
                                <div class="col-3">
                                    <a href="index.php?view=admin&page=jenisBaju&aksi=view" class="btn-link h5 text-light float-right h6"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-body text-dark" style="overflow-y: auto;">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($dataJenisTerpopuler as $rowDataJenisTerpopuler) : ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span style="font-size: 12pt;"><?php echo $rowDataJenisTerpopuler['namaJenis']; ?></span>
                                            <span style="font-size: 14pt;"><?php echo $rowDataJenisTerpopuler['jumlah']; ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Baju Terpopuler -->
                <div class="card text-center mb-5 text-dark bg-warning" style="width: 100%;">
                    <h5 class="card-header">
                        <div class="row justify-content-end">
                            <div class="col-4">Baju Terpopuler</div>
                            <div class="col-4">
                                <a href="index.php?view=admin&page=produk&aksi=filterPopuler" class="btn-link h5 text-dark float-right">Lihat</a>
                            </div>
                        </div>
                    </h5>
                    <div class="card-body text-dark" style="overflow-x: auto;">
                        <div class="row flex-row flex-nowrap">
                            <?php foreach ($dataBajuTerpopuler as $rowDataBajuTerpopuler) : ?>
                                <div class="col-3">
                                    <div class="card border border-dark rounded">
                                        <img class="card-img-top" src="<?php echo $BASE_URL; ?>/assets/img/tersimpan/<?php echo $rowDataBajuTerpopuler['gambarBaju']; ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $rowDataBajuTerpopuler['namaProduk']; ?></h5>
                                            <p class="card-text"><?php echo $rowDataBajuTerpopuler['detailProduk']; ?>.
                                            </p>
                                        </div>
                                        <ul class="list-group list-group-flush text-center">
                                            <li class="list-group-item h6 bg-info text-white">
                                                Stok <?php echo $rowDataBajuTerpopuler['stokBaju']; ?>
                                            </li>
                                        </ul>
                                        <ul class="list-group list-group-flush text-center">
                                            <li class="list-group-item h5 bg-dark text-white">
                                                Rp. <?php echo $rowDataBajuTerpopuler['hargaBaju']; ?>
                                            </li>
                                        </ul>
                                        <div class="card-footer">
                                            <a href="index.php?view=admin&page=produk&aksi=edit&id=<?php echo $rowDataBajuTerpopuler['idBaju']; ?>" class="btn btn-danger btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Baju favorit -->
                <div class="card text-center mb-5 text-dark bg-warning" style="width: 100%;">
                    <h5 class="card-header">
                        <div class="row justify-content-end">
                            <div class="col-4">Baju Terfavorit</div>
                            <div class="col-4">
                                <a href="index.php?view=admin&page=produk&aksi=filterFavorite" class="btn-link h5 text-dark float-right">Lihat</a>
                            </div>
                        </div>
                    </h5>
                    <div class="card-body text-dark" style="overflow-x: auto;">
                        <div class="row flex-row flex-nowrap">
                            <?php foreach ($dataBajuTerfavorite as $rowDataBajuTerfavorite) : ?>
                                <div class="col-3">
                                    <div class="card border border-dark rounded">
                                        <img class="card-img-top" src="<?php echo $BASE_URL; ?>/assets/img/tersimpan/<?php echo $rowDataBajuTerfavorite['gambarBaju']; ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $rowDataBajuTerfavorite['namaProduk']; ?></h5>
                                            <p class="card-text"><?php echo $rowDataBajuTerfavorite['detailProduk']; ?>.
                                            </p>
                                        </div>
                                        <ul class="list-group list-group-flush text-center">
                                            <li class="list-group-item h6 bg-success text-white">
                                                <i class="fa fa-heart" aria-hidden="true"></i> <?php echo $rowDataBajuTerfavorite['jumlahDisukai']; ?>
                                            </li>
                                        </ul>
                                        <ul class="list-group list-group-flush text-center">
                                            <li class="list-group-item h6 bg-info text-white">
                                                Stok <?php echo $rowDataBajuTerfavorite['stokBaju']; ?>
                                            </li>
                                        </ul>
                                        <ul class="list-group list-group-flush text-center">
                                            <li class="list-group-item h5 bg-dark text-white">
                                                Rp. <?php echo $rowDataBajuTerfavorite['hargaBaju']; ?>
                                            </li>
                                        </ul>
                                        <div class="card-footer">
                                            <a href="index.php?view=admin&page=produk&aksi=edit&id=<?php echo $rowDataBajuTerfavorite['idBaju']; ?>" class="btn btn-danger btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-row">
                    <!-- penjualan terbanyak -->
                    <div class="card text-center mr-3 text-white bg-success" style="width: 100%; height: 339px;">
                        <h5 class="card-header">
                            <div class="row">
                                <div class="col-9">Penjualan Terbanyak</div>
                                <div class="col-3">
                                    <a href="index.php?view=admin&page=kota&aksi=view" class="btn-link h5 text-light float-right h6"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-body text-dark" style="overflow-y: auto;">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($dataKotaTerbanyakTransaksi as $rowDataKotaTerbanyakTransaksi) : ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span style="font-size: 12pt;"><?php echo $rowDataKotaTerbanyakTransaksi['kota']; ?></span>
                                            <span style="font-size: 14pt;"><?php echo $rowDataKotaTerbanyakTransaksi['jumlah']; ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- jasa kurir yang sering dipakai -->
                    <div class="card text-center text-white bg-info" style="width: 100%; height: 339px;">
                        <h5 class="card-header">
                            <div class="row">
                                <div class="col-9">Jasa Kurir yang Sering Dipakai</div>
                                <div class="col-3">
                                    <a href="index.php?view=admin&page=kurir&aksi=view" class="btn-link h5 text-light float-right h6"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                </div>
                            </div>
                        </h5>
                        <div class="card-body text-dark" style="overflow-y: auto;">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($dataKurirTerbanyakDigunakan as $rowDataKurirTerbanyakDigunakan) : ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span style="font-size: 12pt;"><?php echo $rowDataKurirTerbanyakDigunakan['kurir']; ?></span>
                                            <span style="font-size: 14pt;"><?php echo $rowDataKurirTerbanyakDigunakan['jumlah']; ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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
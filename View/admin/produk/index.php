<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.css">
    <title>Manajemen Produk</title>
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

    <div class="container mt-5 sticky-top" style="top: 10px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <h5 class="card-header text-light bg-primary">Manajemen Data</h5>
            <div class="card-body text-dark" style="overflow-x: auto;">
                <div class="row flex-row flex-nowrap">
                    <div class="col-3">
                        <a href="index.php?view=admin&page=produk&aksi=view" class="btn btn-outline-primary btn-block btn-sm">Produk</a>
                    </div>
                    <div class="col-3">
                        <a href="index.php?view=admin&page=jenisBaju&aksi=view" class="btn btn-outline-primary btn-block btn-sm">Jenis Baju</a>
                    </div>
                    <div class="col-3">
                        <a href="index.php?view=admin&page=kategoriBaju&aksi=view" class="btn btn-outline-primary btn-block btn-sm">Kategori Baju</a>
                    </div>
                    <div class="col-3">
                        <a href="index.php?view=admin&page=merekBaju&aksi=view" class="btn btn-outline-primary btn-block btn-sm">Merek Baju</a>
                    </div>
                    <div class="col-3">
                        <a href="index.php?view=admin&page=ukuranBaju&aksi=view" class="btn btn-outline-primary btn-block btn-sm">Ukuran Baju</a>
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-dark font-weight-bold">
                    <div class="row">
                        <div class="col-2">
                            <span class="float-left">Total : <?php echo $jumlahBaju; ?> Baju</span>
                        </div>
                        <div class="col-4 text-center">
                            <span>Manajemen Produk</span>
                            <?php if (isset($judul)) : ?>
                                <?php if ($judul == "populer") : ?>
                                    <h6>Baju Terpopuler (<?php echo count($dataSeluruhBajuFavorite); ?>)</h6>
                                <?php elseif ($judul == "favorite") : ?>
                                    <h6>Baju Terfavorite (<?php echo count($dataSeluruhBajuFavorite); ?>)</h6>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalCariProduk">
                                Cari & Filter Produk
                            </button>
                            <a href="index.php?view=admin&page=produk&aksi=filterPopuler" class="my-auto btn btn-warning btn-sm mb-3">
                                Terpopuluer
                            </a>
                            <a href="index.php?view=admin&page=produk&aksi=filterFavorite" class="my-auto btn btn-primary btn-sm mb-3">
                                Terfavorite
                            </a>
                            <a href="index.php?view=admin&page=produk&aksi=tambah" class=" my-auto btn btn-success btn-sm float-right mb-3">
                                Tambah Data
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-center">
                    <?php if (isset($hasilPencarian) == "found") : ?>
                        <?php if (!empty($dataSeluruhBajuFavorite)) : ?>
                            <?php foreach ($dataSeluruhBajuFavorite as $rowDataSeluruhBajuFavorite) : ?>
                                <div class="card mb-4" style="width: 12rem;">
                                    <img class="card-img-top img-thumbnail" src="<?php echo $BASE_URL; ?>/assets/img/tersimpan/<?php echo $rowDataSeluruhBajuFavorite['gambarBaju']; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $rowDataSeluruhBajuFavorite['namaProduk']; ?></h5>
                                        <p class="card-text"><?php echo $rowDataSeluruhBajuFavorite['detailProduk']; ?>.
                                        </p>
                                    </div>
                                    <ul class="list-group list-group-flush text-center">
                                        <li class="list-group-item h6 bg-success text-white">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            <?php if (!empty($rowDataSeluruhBajuFavorite['jumlahDisukai'])) : ?>
                                                <?php echo $rowDataSeluruhBajuFavorite['jumlahDisukai']; ?>
                                            <?php else : ?>
                                                0
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                    <ul class="list-group list-group-flush text-center">
                                        <li class="list-group-item h6 bg-info text-white">
                                            Stok <?php echo $rowDataSeluruhBajuFavorite['stokBaju']; ?>
                                        </li>
                                    </ul>
                                    <ul class="list-group list-group-flush text-center">
                                        <li class="list-group-item h5 bg-dark text-white">
                                            Rp. <?php echo $rowDataSeluruhBajuFavorite['hargaBaju']; ?>
                                        </li>
                                    </ul>
                                    <div class="card-footer">
                                        <a href="index.php?view=admin&page=produk&aksi=edit&id=<?php echo $rowDataSeluruhBajuFavorite['idBaju']; ?>" class="btn btn-danger btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="alert alert-danger" role="alert">
                                Produk tidak ditemukan !
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="alert alert-danger" role="alert">
                            Produk tidak ditemukan !
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- modal cari & filter produk -->
    <div class="modal fade bd-example-modal-lg" id="modalCariProduk" tabindex="-1" role="dialog" aria-labelledby="modalLabelCariProduk" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCariProduk">Cari & Filter Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php?view=admin&page=produk&aksi=adminCariBaju" method="post">
                        <div class="form-group row mb-3">
                            <label for="inputProduk" class="col-sm-3 col-form-label">Cari Produk</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pencarian" id="inputProduk" placeholder="Masukkan Produk">
                                <button type="submit" class="btn btn-primary btn btn-block mt-1">Cari Produk</button>
                            </div>
                        </div>
                    </form>
                    <form action="index.php?view=admin&page=produk&aksi=adminFilterPencarian" method="post">
                        <span class="font-weight-bold">Filter Berdasarkan</span>
                        <div class="form-group row mt-2">
                            <label for="inputJenis" class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-10 mb-2">
                                <select class="custom-select" name="jenis">
                                    <option selected value="">Pilih Jenis</option>
                                    <?php foreach ($dataJenisBaju as $rowDataJenisBaju) : ?>
                                        <option value="<?php echo $rowDataJenisBaju['jenisBaju']; ?>"><?php echo $rowDataJenisBaju['jenisBaju']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10 mb-2">
                                <select class="custom-select" name="kategori">
                                    <option selected value="">Pilih Kategori</option>
                                    <?php foreach ($dataKategoriBaju as $rowDataKategoriBaju) : ?>
                                        <option value="<?php echo $rowDataKategoriBaju['kategoriBaju']; ?>"><?php echo $rowDataKategoriBaju['kategoriBaju']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="inputMerek" class="col-sm-2 col-form-label">Merek</label>
                            <div class="col-sm-10 mb-2">
                                <select class="custom-select" name="merek">
                                    <option selected value="">Pilih Merek</option>
                                    <?php foreach ($dataMerekBaju as $rowDataMerekBaju) : ?>
                                        <option value="<?php echo $rowDataMerekBaju['merekBaju']; ?>"><?php echo $rowDataMerekBaju['merekBaju']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="inputMerek" class="col-sm-2 col-form-label">Ukuran</label>
                            <div class="col-sm-10 mb-2">
                                <select class="custom-select" name="ukuran">
                                    <option selected value="">Pilih Ukuran Baju</option>
                                    <?php foreach ($dataUkuranBaju as $rowDataUkuranBaju) : ?>
                                        <option value="<?php echo $rowDataUkuranBaju['ukuranBaju']; ?>"><?php echo $rowDataUkuranBaju['ukuranBaju']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <label for="inputUrutkanHarga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10 mb-2">
                                <select class="custom-select" name="harga">
                                    <option selected>Urutkan Harga</option>
                                    <option value="max">Tertinggi</option>
                                    <option value="min">Terendah</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Terapkan</button>
                </div>
                </form>
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
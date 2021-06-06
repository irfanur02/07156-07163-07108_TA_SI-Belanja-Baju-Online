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
        <a class="navbar-brand mb-0 h1" href="../../admin/index.html">Sistem Informasi Belanja Baju</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../../admin/index.html">Menu Utama</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manajemen Data
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalPilihManajemenData">Produk</button>
                        <a href="../../admin/status_pembelian/index.html" class="dropdown-item">Status Pembelian</a>
                        <a href="../../admin/kota/index.html" class="dropdown-item">Kota</a>
                        <a href="../../admin/kurir/index.html" class="dropdown-item">Kurir</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../../admin/permintaan.html">Permintaan <span class="badge badge-primary">4</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../../admin/laporan/index.html">Laporan</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="../../admin/login.html" class="btn btn-primary mr-3 my-2 my-sm-0" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Keluar</a>
            </form>
        </div>
    </nav>

    <div class="container mt-5 sticky-top" style="top: 10px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <h5 class="card-header text-light bg-primary">Manajemen Data</h5>
            <div class="card-body text-dark" style="overflow-x: auto;">
                <div class="row flex-row flex-nowrap">
                    <div class="col-3">
                        <a href="../../admin/produk/index.html" class="btn btn-outline-primary btn-block btn-sm">Produk</a>
                    </div>
                    <div class="col-3">
                        <a href="../../admin/jenis_baju/index.html" class="btn btn-outline-primary btn-block btn-sm">Jenis Baju</a>
                    </div>
                    <div class="col-3">
                        <a href="../../admin/kategori_baju/index.html" class="btn btn-outline-primary btn-block btn-sm">Kategori Baju</a>
                    </div>
                    <div class="col-3">
                        <a href="../../admin/merek_baju/index.html" class="btn btn-outline-primary btn-block btn-sm">Merek Baju</a>
                    </div>
                    <div class="col-3">
                        <a href="../../admin/ukuran_baju/index.html" class="btn btn-outline-primary btn-block btn-sm">Ukuran Baju</a>
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-dark font-weight-bold">
                    <div class="row">
                        <div class="col-4">
                            <span class="float-left">Total : 140 Baju</span>
                        </div>
                        <div class="col-4 text-center">
                            <span>Manajemen Produk</span>
                        </div>
                        <div class="col-4">
                            <a href="../../admin/produk/tambah_produk.html" class="btn btn-success btn-sm float-right mb-3">
                                Tambah Data
                            </a>
                            <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalCariProduk">
                                Cari & Filter Produk
                            </button>
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
                    <div class="card mb-4" style="width: 12rem;">
                        <img class="card-img-top img-thumbnail" src="<?php echo $BASE_URL; ?>/assets/img/casual 1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural
                                lead-in to
                                additional content.
                            </p>
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item h6 bg-success text-white">
                                <i class="fa fa-heart" aria-hidden="true"></i> 43
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item h6 bg-info text-white">
                                Stok 26
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item h5 bg-dark text-white">
                                Rp. 170.000
                            </li>
                        </ul>
                        <div class="card-footer">
                            <a href="../../admin/produk/edit_produk.html" class="btn btn-danger btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                        </div>
                    </div>
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
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group row mb-3">
                            <label for="inputProduk" class="col-sm-3 col-form-label">Cari Produk</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="produk" id="inputProduk" placeholder="Masukkan Produk">
                            </div>
                        </div>
                        <span class="font-weight-bold">Filter Berdasarkan</span>
                        <div class="form-group row mt-2">
                            <label for="inputJenis" class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-10 mb-2">
                                <select class="custom-select" name="jenis">
                                    <option selected>Pilih Jenis</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>
                            <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10 mb-2">
                                <select class="custom-select" name="kategori">
                                    <option selected>Pilih Kategori</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>
                            <label for="inputMerek" class="col-sm-2 col-form-label">Merek</label>
                            <div class="col-sm-10 mb-2">
                                <select class="custom-select" name="merek">
                                    <option selected>Pilih Merek</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>
                            <label for="inputUkuran" class="col-sm-2 col-form-label">Ukuran</label>
                            <div class="col-sm-10 mb-2">
                                <select class="custom-select" name="ukuran">
                                    <option selected>Pilih Ukuran</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>
                            <label for="inputUrutkanHarga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10 mb-2">
                                <select class="custom-select" name="harga">
                                    <option selected>Urutkan Harga</option>
                                    <option value="1">Tertinggi</option>
                                    <option value="2">Terendah</option>
                                </select>
                            </div>
                            <label for="inputWarna" class="col-sm-2 col-form-label">Warna</label>
                            <div class="col-sm-10 mb-2">
                                <input type="text" class="form-control" name="warna" id="inputWarna" placeholder="Masukkan Warna">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="custom-control custom-checkbox float-right">
                                    <input type="checkbox" class="custom-control-input" name="terlaris" id="inputTerlaris">
                                    <label class="custom-control-label" for="inputTerlaris">Terpopuler</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="disukai" id="inputDisukai">
                                    <label class="custom-control-label" for="inputDisukai">Disukai</label>
                                </div>
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
                    <a href="../../admin/produk/index.html" class="btn btn-light btn-block">Produk</a>
                    <a href="../../admin/jenis_baju/index.html" class="btn btn-light btn-block">Jenis Baju</a>
                    <a href="../../admin/kategori_baju/index.html" class="btn btn-light btn-block">Kategori Baju</a>
                    <a href="../../admin/merek_baju/index.html" class="btn btn-light btn-block">Merek Baju</a>
                    <a href="../../admin/ukuran_baju/index.html" class="btn btn-light btn-block">Ukuran Baju</a>
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
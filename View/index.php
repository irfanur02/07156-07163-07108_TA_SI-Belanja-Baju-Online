<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.css">
    <title>Belanja Baju Online</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand mb-0 h1" href="index.php?page=utama&aksi=view">Belanja Baju Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <form action="index.php?page=utama&aksi=cariBaju" method="post" class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Baju" aria-label="Search">
                        <button class="btn btn-light my-2 my-sm-0 font-weight-bold" type="submit">Cari</button>
                    </form>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-dark ml-2" data-toggle="modal" data-target="#modalFilterPencarianProduk">Filter</button>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle mr-3 my-2 my-sm-0" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nama
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index.php?page=profil&aksi=view">Profil</a>
                        <a class="dropdown-item" href="index.php?page=favorite&aksi=view">Favorite</a>
                        <a class="dropdown-item" href="index.php?page=historiTransaksi&aksi=view">Histori
                            Transaksi</a>
                        <a class="dropdown-item" href="index.php?page=utama&aksi=prosesLogout">Keluar</a>
                    </div>
                </div>
                <a href="index.php?page=keranjang&aksi=view" class="btn btn-info border-dark mr-3 my-2 my-sm-0">
                    Keranjang <span class="badge badge-light" id="jumlahKeranjang">2</span>
                </a>
                <a href="index.php?page=pembelian&aksi=view" class="btn btn-dark mr-3 my-2 my-sm-0">
                    Pembelian
                </a>
                </a>
                <button type="button" class="btn btn-primary border-white mr-3 my-2 my-sm-0" data-toggle="modal" data-target="#modalLogin">
                    Login
                </button>
                <a href="index.php?page=daftar&aksi=view" class="btn btn-light mr-3 my-2 my-sm-0">
                    Daftar
                </a>
            </form>
        </div>
    </nav>

    <div style="margin-top: 40px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="card">
                <div class="card-header bg-warning text-center">
                    <span class="h3">Baju Terpopuler</span>
                </div>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <img src="<?php echo $BASE_URL; ?>/assets/img/casual 6.jpg" class="rounded img-fluid" alt="Image Preview">
                                    </div>
                                    <div class="col-7">
                                        <div class="card" style="height: 100%;">
                                            <div class="card-body">
                                                <h5 class="card-title">Special title treatment</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in
                                                    to additional content.
                                                </p>
                                                <h6 class="card-subtitle mb-2 text-muted">Stok 5</h6>
                                                <blockquote class="blockquote font-weight-bold">
                                                    <p class="mb-0">Rp. 100.000</p>
                                                </blockquote>
                                                <a href="javascript:0" data-id="1" class="btn btn-primary tambahKeranjang">
                                                    Masukkan Keranjang
                                                </a>
                                                <a href="javascript:0" data-id="1" class="btn btn-light border-dark simpanBaju">
                                                    <i class="fa fa-heart" aria-hidden="true"></i> Simpan
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <img src="<?php echo $BASE_URL; ?>/assets/img/casual 6.jpg" class="rounded img-fluid" alt="Image Preview">
                                    </div>
                                    <div class="col-7">
                                        <div class="card" style="height: 100%;">
                                            <div class="card-body">
                                                <h5 class="card-title">Special title treatment</h5>
                                                <p class="card-text">With supporting text below as a natural lead-in
                                                    to additional content.
                                                </p>
                                                <h6 class="card-subtitle mb-2 text-muted">Stok 5</h6>
                                                <blockquote class="blockquote font-weight-bold">
                                                    <p class="mb-0">Rp. 100.000</p>
                                                </blockquote>
                                                <a href="javascript:0" data-id="2" class="btn btn-primary tambahKeranjang">
                                                    Masukkan Keranjang
                                                </a>
                                                <a href="javascript:0" data-id="2" class="btn btn-light border-dark simpanBaju">
                                                    <i class="fa fa-heart" aria-hidden="true"></i> Simpan
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="d-flex flex-wrap justify-content-center">
            <div class="card mb-4" style="width: 16rem;">
                <img class="card-img-top img-thumbnail" src="<?php echo $BASE_URL; ?>/assets/img/casual 1.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural
                        lead-in to
                        additional content.
                    </p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item h6 bg-info text-white">
                        Stok 26
                    </li>
                </ul>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item h6 bg-dark text-white">
                        Rp. 170.000
                    </li>
                </ul>
                <div class="card-footer text-center">
                    <a href="javascript:0" data-id="3" class="btn btn-primary tambahKeranjang btn-block mb-1">
                        Masukkan Keranjang
                    </a>
                    <a href="javascript:0" data-id="3" class="btn btn-light border-dark simpanBaju">
                        <i class="fa fa-heart" aria-hidden="true"></i> Simpan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitleLogin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLongTitleLogin">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php?page=utama&aksi=prosesLogin" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Username">Masukkan Username</label>
                            <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="Password">Masukkan Password</label>
                            <input type="text" class="form-control" id="inputPassword" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal filter pencarian -->
    <div class="modal fade bd-example-modal-lg" id="modalFilterPencarianProduk" tabindex="-1" role="dialog" aria-labelledby="modalLabelFilterPencarianProduk" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFilterPencarianProduk">Filter Pencarian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php?page=utama&aksi=filterPencarian" method="post">
                    <div class="modal-body">
                        <span class="font-weight-bold">Berdasarkan :</span>
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
                            <label for="inputUrutkanHarga" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <form>
                                    <div class="form-row align-items-center">
                                        <div class="col-sm-6 my-1 text-center">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Terkecil</label>
                                                <input type="text" class="form-control" name="hargaTerkecil" value="100000" id="formGroupExampleInput" placeholder="Harga Terkecil">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 my-1 text-center">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Terbesar</label>
                                                <input type="text" class="form-control" name="hargaTerbesar" value="1000000" id="formGroupExampleInput" placeholder="Harga Terbesar">
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary col-5">Terapkan</button>
                    </div>
                </form>
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
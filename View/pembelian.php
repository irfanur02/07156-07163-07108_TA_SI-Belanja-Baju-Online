<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Dashboard Pembelian</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand mb-0 h1" href="index.php?page=utama&aksi=view">Belanja Baju Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
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
            </form>
        </div>
    </nav>

    <div class="container mt-5 sticky-top" style="top: 50px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <div class="card-body text-dark" style="overflow-x: auto;">
                <div class="row flex-row flex-nowrap justify-content-center">
                    <div class="col-3">
                        <a href="index.php?page=pembelian&aksi=keadaanTerproses" class="btn btn-outline-primary btn-block btn-sm">Dalam
                            Proses</a>
                    </div>
                    <div class="col-3">
                        <a href="index.php?page=pembelian&aksi=keadaanTerkirim" class="btn btn-outline-primary btn-block btn-sm">Telah
                            Dikirim</a>
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item h5 bg-primary text-white">Dalam Proses</li>
            </ul>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2 align-self-center">
                                        <p class="text-center h6">Tanggal</br>Buat Transaksi</br>2021-02-04</p>
                                        <p class="text-center"><mark><u>Mark</u></mark></p>
                                        <p class="text-center">Jasa Pengiriman</br>JNE</p>
                                        <div class="alert alert-dark" role="alert">
                                            <p class="text-center h6">Total Harga</br><strong>Rp. 23434</strong></p>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="card-body text-dark" style="overflow-x: auto;">
                                            <div class="row flex-row flex-nowrap">
                                                <div class="col-6">
                                                    <div class="row justify-content-center">
                                                        <div class="col-4">
                                                            <img src="<?php echo $BASE_URL; ?>/assets/img/casual 6.jpg" class="rounded img-fluid" alt="Image Preview">
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="card" style="height: 100%;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Special title treatment
                                                                    </h5>
                                                                    <p class="card-text">With supporting text below
                                                                        as a
                                                                        natural lead-in
                                                                        to additional content.
                                                                    </p>
                                                                    <blockquote class="blockquote font-weight-bold">
                                                                        <p class="mb-0">Rp. <span class="hargaBaju">150000</span></p>
                                                                    </blockquote>
                                                                    <div class="form-inline">
                                                                        <label for="txtJumlah" class="mr-2">jumlah</label>
                                                                        <input type="text" class="form-control text-center jumlahBaju" style="width: 4rem;" value="1" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row justify-content-center">
                                                        <div class="col-4">
                                                            <img src="<?php echo $BASE_URL; ?>/assets/img/casual 6.jpg" class="rounded img-fluid" alt="Image Preview">
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="card" style="height: 100%;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Special title treatment
                                                                    </h5>
                                                                    <p class="card-text">With supporting text below
                                                                        as a
                                                                        natural lead-in
                                                                        to additional content.
                                                                    </p>
                                                                    <blockquote class="blockquote font-weight-bold">
                                                                        <p class="mb-0">Rp. <span class="hargaBaju">150000</span></p>
                                                                    </blockquote>
                                                                    <div class="form-inline">
                                                                        <label for="txtJumlah" class="mr-2">jumlah</label>
                                                                        <input type="text" class="form-control text-center jumlahBaju" style="width: 4rem;" value="1" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row justify-content-center">
                                                        <div class="col-4">
                                                            <img src="<?php echo $BASE_URL; ?>/assets/img/casual 6.jpg" class="rounded img-fluid" alt="Image Preview">
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="card" style="height: 100%;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Special title treatment
                                                                    </h5>
                                                                    <p class="card-text">With supporting text below
                                                                        as a
                                                                        natural lead-in
                                                                        to additional content.
                                                                    </p>
                                                                    <blockquote class="blockquote font-weight-bold">
                                                                        <p class="mb-0">Rp. <span class="hargaBaju">150000</span></p>
                                                                    </blockquote>
                                                                    <div class="form-inline">
                                                                        <label for="txtJumlah" class="mr-2">jumlah</label>
                                                                        <input type="text" class="form-control text-center jumlahBaju" style="width: 4rem;" value="1" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="<?php echo $BASE_URL; ?>/assets/js/jquery-3.6.0.min.js"> </script>
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
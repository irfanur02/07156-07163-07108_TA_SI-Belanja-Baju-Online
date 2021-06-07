<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Dashboard Profil</title>
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

    <div class="container mt-5" style="margin-top: 40px;">
        <div class="jumbotron jumbotron-fluid">
            <center>
                <div class="container">
                    <div class="card" style="width : 50%;">
                        <div class=" card-header">
                            <span class="h2">Profil</span>
                            <button class="btn btn-warning float-right" id="btnEditProfil">Edit
                                Profil</button>
                        </div>
                        <form action="index.php?page=profil&aksi=update" method="post" id="formEditProfil">
                            <div class="card-body">
                                <div class="row ml-1">
                                    <div class="form-inline">
                                        <label for="txtNama">Nama : </label>
                                        <input type="text" class="form-control ml-2" id="txtNama" name="nama" value="">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtTanggallahir">Tanggal Lahir : </label>
                                        <input type="date" class="form-control ml-2" id="txtTanggallahir" name="tanggalLahir" value="">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label>Jenis Kelamin : </label>
                                        <div class="form-check ml-2">
                                            <input class="form-check-input" type="radio" name="jenisKelamin" id="rbLaki" value="option1" checked>
                                            <label class="form-check-label" for="rbLaki">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check ml-2">
                                            <input class="form-check-input" type="radio" name="jenisKelamin" id="rbPerempuan" value="option1">
                                            <label class="form-check-label" for="rbPerempuan">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtAlamat">Alamat : </label>
                                        <input type="text" class="form-control ml-2" id="txtAlamat" name="alamat" value="">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtKota">Kota : </label>
                                        <input type="text" class="form-control ml-2" id="txtKota" name="kota" value="">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtNoTelp">No. Telp : </label>
                                        <input type="text" class="form-control ml-2" id="txtNoTelp" name="noTelp" value="">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtEmail">Email : </label>
                                        <input type="email" class="form-control ml-2" id="txtEmail" name="email" value="">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtUsername">Username : </label>
                                        <input type="text" class="form-control ml-2" id="txtUsername" name="username" value="">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtPassword">Password : </label>
                                        <input type="password" class="form-control ml-2" id="txtPassword" name="password" value="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3" style="display: none;" id="btnUpdate">Update</button>
                        </form>
                    </div>
                </div>
            </center>
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
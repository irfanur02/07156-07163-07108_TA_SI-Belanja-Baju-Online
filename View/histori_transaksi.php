<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Dashboard Histori Transaksi</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand mb-0 h1" href="../View/index.html">Belanja Baju Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <form action="" method="" class="form-inline">
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
                        <a class="dropdown-item" href="../View/profil.html">Profil</a>
                        <a class="dropdown-item" href="../View/favorite.html">Favorite</a>
                        <a class="dropdown-item" href="../View/histori_transaksi.html">Histori Transaksi</a>
                        <a class="dropdown-item" href="../View/index.html">Keluar</a>
                    </div>
                </div>
                <a href="../View/keranjang.html" class="btn btn-info border-dark mr-3 my-2 my-sm-0">
                    Keranjang <span class="badge badge-light" id="jumlahKeranjang">2</span>
                </a>
                <a href="../View/pembelian.html" class="btn btn-dark mr-3 my-2 my-sm-0">
                    Pembelian
                </a>
            </form>
        </div>
    </nav>

    <div class="container mt-5 sticky-top" style="top: 50px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item h5 bg-info text-white">Histori Transaksi</li>
            </ul>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <table class="table table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col" style="width: 5%;">No. </th>
                            <th scope="col" style="width: 10%;">Tanggal</th>
                            <th scope="col" style="width: 10%;">Total Pembelian</th>
                            <th scope="col" style="width: 75%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        <tr>
                            <th scope="row" class="text-center">1.</th>
                            <td>2021-03-02</td>
                            <td>Rp. 100000</td>
                            <td>
                                <div class="row">
                                    <div class="col-8">
                                        <table class="table table-sm table-bordered">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col" style="width: 35%;">Barang</th>
                                                    <th scope="col" style="width: 15%;">Jumah</th>
                                                    <th scope="col" style="width: 25%;">Harga</th>
                                                    <th scope="col" style="width: 25%;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-light">
                                                <tr>
                                                    <td>
                                                        <img class="card-img-top img-thumbnail" src="<?php echo $BASE_URL; ?>/assets/img/casual 1.jpg" style="width: 50%;" alt="Card image cap">
                                                        Mark
                                                    </td>
                                                    <td>Mark</td>
                                                    <td>Mark</td>
                                                    <td>Mark</td>
                                                </tr>
                                                <tr>
                                                    <th scope="col" colspan="3"><span class="float-right">total
                                                            pembelian : </span></th>
                                                    <th scope="col">123124 </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <span>
                                                    Alamat : gresik</br>
                                                    Jarak : 1 km</br>
                                                    jasa pengiriman : JNE</br>
                                                    biaya pengiriman : 6000</br>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <span>
                                                    total harga : 6000
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
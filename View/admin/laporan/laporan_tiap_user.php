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

    <div class="container mt-5 sticky-top" style="top: 53px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <h5 class="card-header text-light bg-primary">
                <div class="row">
                    <div class="col-4">
                        <a href="../../admin/laporan/index.html" class="btn btn-light float-left">Kembali</a>
                    </div>
                    <div class="col-4">
                        Laporan
                    </div>
                </div>
            </h5>
        </div>
    </div>

    <div class="container" id="kontenLaporan" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="card mb-2">
                    <div class="card-body">
                        <span>Nama : agung</br>Email : agung@gmail.com</span>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col" style="width: 5%;">No. </th>
                            <th scope="col" style="width: 10%;">Tanggal</th>
                            <th scope="col" style="width: 85%;">Detail Pembelian</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        <tr>
                            <th scope="row" class="text-center">1.</th>
                            <td>2021-03-03</td>
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
                                                    <th scope="col" colspan="3">total pembelian : </th>
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
                                                    jasa pengiriman : JNE (6000)</br>
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
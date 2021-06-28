<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Manajemen Kategori Baju</title>
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
                        <div class="col-4">
                            <span class="float-left">Total : 140 Merek</span>
                        </div>
                        <div class="col-4">
                            <span>Manajemen Merek Baju</span>
                        </div>
                        <div class="col-4">
                            <a href="index.php?view=admin&page=merekBaju&aksi=tambah" class="btn btn-success btn-sm float-right mb-3">
                                Tambah Data
                            </a>
                            <button class="btn btn-dark btn-sm mb-3" data-toggle="collapse" data-target="#collapseCariMerekBaju" aria-expanded="true" aria-controls="collapseOne">
                                Cari
                            </button>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card">
                            <div id="collapseCariMerekBaju" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <form action="index.php?view=admin&page=merekBaju&aksi=filter" method="post">
                                    <div class="card-body bg-dark text-white font-weight-normal">
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group row">
                                                    <label for="inputMerekBaju" class="col-sm-5 col-form-label">Cari
                                                        Merek Baju</label>
                                                    <div class="col-sm-5">
                                                        <select class="custom-select" name="merek">
                                                            <option selected>Pilih Merek</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-primary">Terapkan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col" style="width: 10%;">No. </th>
                            <th scope="col" style="width: 70%;">Merek Baju</th>
                            <th scope="col" style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        <tr>
                            <th scope="row" class="text-center">1.</th>
                            <td>Mark</td>
                            <td class="text-center">
                                <a href="index.php?view=admin&page=merekBaju&aksi=edit&id=masihkosong" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">1.</th>
                            <td>Mark</td>
                            <td class="text-center">
                                <a href="index.php?view=admin&page=merekBaju&aksi=edit&id=masihkosong" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">1.</th>
                            <td>Mark</td>
                            <td class="text-center">
                                <a href="index.php?view=admin&page=merekBaju&aksi=edit&id=masihkosong" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">1.</th>
                            <td>Mark</td>
                            <td class="text-center">
                                <a href="index.php?view=admin&page=merekBaju&aksi=edit&id=masihkosong" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">1.</th>
                            <td>Mark</td>
                            <td class="text-center">
                                <a href="index.php?view=admin&page=merekBaju&aksi=edit&id=masihkosong" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">1.</th>
                            <td>Mark</td>
                            <td class="text-center">
                                <a href="index.php?view=admin&page=merekBaju&aksi=edit&id=masihkosong" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">1.</th>
                            <td>Mark</td>
                            <td class="text-center">
                                <a href="index.php?view=admin&page=merekBaju&aksi=edit&id=masihkosong" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
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
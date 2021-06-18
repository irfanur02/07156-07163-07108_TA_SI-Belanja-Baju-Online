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
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Baju" name="pencarian" aria-label="Search">
                        <button class="btn btn-light my-2 my-sm-0 font-weight-bold" type="submit">Cari</button>
                    </form>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-dark ml-2" data-toggle="modal" data-target="#modalFilterPencarianProduk">Filter</button>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <?php if ($_SESSION['statusUser'] == 'logged') : ?>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle mr-3 my-2 my-sm-0" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <input type="hidden" name="idUser" id="idUser" value="4">
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
                        Keranjang
                        <?php if ($jumlahKeranjang != 0) : ?>
                            <span class="badge badge-light" id="jumlahKeranjang"><?php echo $jumlahKeranjang; ?></span>
                        <?php else : ?>
                            <span class="badge badge-light" id="jumlahKeranjang">0</span>
                        <?php endif; ?>
                    </a>
                    <a href="index.php?page=pembelian&aksi=view" class="btn btn-dark my-2 my-sm-0">
                        Pembelian
                    </a>
                <?php endif; ?>
                <?php if ($_SESSION['statusUser'] != 'logged') : ?>
                    <div class="alert alert-info my-0 mr-3" role="alert">
                        Login untuk dapat melakukan Pembelian !
                    </div>
                    <button type="button" class="btn btn-primary border-white mr-3 my-2 my-sm-0" data-toggle="modal" data-target="#modalLogin">
                        Login
                    </button>
                    <a href="index.php?page=daftar&aksi=view" class="btn btn-light my-2 my-sm-0">
                        Daftar
                    </a>
                <?php endif; ?>
            </form>
        </div>
    </nav>

    <div style="margin-top: 40px;">
        <?php if (isset($data) == "produk_populer") : ?>
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
                        <?php foreach ($dataBajuPopuler as $index => $rowDataBajuPopuler) : ?>
                            <?php if ($index == 0) : ?>
                                <div class="carousel-item active">
                                <?php else : ?>
                                    <div class="carousel-item">
                                    <?php endif; ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-3">
                                                    <img src="<?php echo $BASE_URL; ?>/assets/img/<?php echo $rowDataBajuPopuler['gambarBaju']; ?>" class="rounded img-fluid" style="height: 19rem;" alt="Image Preview">
                                                </div>
                                                <div class="col-7">
                                                    <div class="card" style="height: 100%;">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo $rowDataBajuPopuler['namaProduk']; ?></h5>
                                                            <p class="card-text"><?php echo $rowDataBajuPopuler['detailProduk']; ?>.
                                                            </p>
                                                            <h6 class="card-subtitle mb-2 text-muted">Stok <?php echo $rowDataBajuPopuler['stokBaju']; ?></h6>
                                                            <blockquote class="blockquote font-weight-bold">
                                                                <p class="mb-0">Rp. <?php echo $rowDataBajuPopuler['hargaBaju']; ?></p>
                                                            </blockquote>
                                                            <!-- keranjang -->
                                                            <?php if ($_SESSION['statusUser'] == 'logged') : ?>
                                                                <?php if (!empty($dataKeranjangUser)) : ?>
                                                                    <?php foreach ($dataKeranjangUser as $key => $rowDataKeranjangUser) : ?>
                                                                        <?php if ($rowDataBajuPopuler['idBaju'] == $rowDataKeranjangUser['idBaju']) : ?>
                                                                            <button class="btn btn-success mb-1">
                                                                                Telah Masuk Keranjang
                                                                            </button>
                                                                            <?php break; ?>
                                                                        <?php elseif ($rowDataBajuPopuler['idBaju'] != $rowDataKeranjangUser['idBaju'] && $key == count($dataKeranjangUser) - 1) : ?>
                                                                            <a href="javascript:0" data-id="<?php echo $rowDataBajuPopuler['idBaju']; ?>" class="btn btn-primary tambahKeranjang mb-1">
                                                                                Masukkan Keranjang
                                                                            </a>
                                                                        <?php elseif ($rowDataBajuPopuler['idBaju'] != $rowDataKeranjangUser['idBaju'] && $key < count($dataKeranjangUser)) : ?>
                                                                            <?php continue; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                <?php else : ?>
                                                                    <a href="javascript:0" data-id="<?php echo $rowDataSeluruhBaju['idBaju']; ?>" class="btn btn-primary tambahKeranjang mb-1">
                                                                        Masukkan Keranjang
                                                                    </a>
                                                                <?php endif; ?>
                                                                <!-- simpan -->
                                                                <?php if (!empty($dataBajuFavorite)) : ?>
                                                                    <?php foreach ($dataBajuFavorite as $key => $rowDataBajuFavorite) : ?>
                                                                        <?php if ($rowDataBajuPopuler['idBaju'] == $rowDataBajuFavorite['idBaju']) : ?>
                                                                            <button class="btn btn-danger">
                                                                                <i class="fa fa-heart" aria-hidden="true"></i> Tersimpan
                                                                            </button>
                                                                            <?php break; ?>
                                                                        <?php elseif ($rowDataBajuPopuler['idBaju'] != $rowDataBajuFavorite['idBaju'] &&  $key == count($dataBajuFavorite) - 1) : ?>
                                                                            <a href="javascript:0" data-id="<?php echo $rowDataBajuPopuler['idBaju']; ?>" class="btn btn-light border-dark simpanBaju">
                                                                                <i class="fa fa-heart" aria-hidden="true"></i> Simpan
                                                                            </a>
                                                                        <?php elseif ($rowDataBajuPopuler['idBaju'] != $rowDataBajuFavorite['idBaju'] &&  $key < count($dataBajuFavorite)) : ?>
                                                                            <?php continue; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                <?php else : ?>
                                                                    <a href="javascript:0" data-id="<?php echo $rowDataSeluruhBaju['idBaju']; ?>" class="btn btn-light border-dark simpanBaju">
                                                                        <i class="fa fa-heart" aria-hidden="true"></i> Simpan
                                                                    </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                <?php endforeach; ?>
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
        <?php endif; ?>

        <div style="margin-top: 100px;">
            <div class="container mb-5">
                <div class="d-flex flex-wrap justify-content-center">
                    <?php if (isset($hasilPencarian) == "found") : ?>
                        <?php if (!empty($dataSeluruhBaju)) : ?>
                            <?php foreach ($dataSeluruhBaju as $rowDataSeluruhBaju) : ?>
                                <div class="card mb-4" style="width: 16rem;">
                                    <img class="card-img-top img-thumbnail" src="<?php echo $BASE_URL; ?>/assets/img/<?php echo $rowDataSeluruhBaju['gambarBaju']; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $rowDataSeluruhBaju['namaProduk']; ?></h5>
                                        <p class="card-text"><?php echo $rowDataSeluruhBaju['detailProduk']; ?>.
                                        </p>
                                    </div>
                                    <ul class="list-group list-group-flush text-center">
                                        <li class="list-group-item h6 bg-info text-white">
                                            Stok <?php echo $rowDataSeluruhBaju['stokBaju']; ?>
                                        </li>
                                    </ul>
                                    <ul class="list-group list-group-flush text-center">
                                        <li class="list-group-item h6 bg-dark text-white">
                                            Rp. <?php echo $rowDataSeluruhBaju['hargaBaju']; ?>
                                        </li>
                                    </ul>
                                    <div class="card-footer text-center">
                                        <?php if ($_SESSION['statusUser'] == 'logged') : ?>
                                            <!-- keranjang -->
                                            <?php if (!empty($dataKeranjangUser)) : ?>
                                                <?php foreach ($dataKeranjangUser as $key => $rowDataKeranjangUser) : ?>
                                                    <?php if ($rowDataSeluruhBaju['idBaju'] == $rowDataKeranjangUser['idBaju']) : ?>
                                                        <button class="btn btn-success mb-1">
                                                            Telah Masuk Keranjang
                                                        </button>
                                                        <?php break; ?>
                                                    <?php elseif ($rowDataSeluruhBaju['idBaju'] != $rowDataKeranjangUser['idBaju'] && $key == count($dataKeranjangUser) - 1) : ?>
                                                        <a href="javascript:0" data-id="<?php echo $rowDataSeluruhBaju['idBaju']; ?>" class="btn btn-primary tambahKeranjang mb-1">
                                                            Masukkan Keranjang
                                                        </a>
                                                    <?php elseif ($rowDataSeluruhBaju['idBaju'] != $rowDataKeranjangUser['idBaju'] && $key < count($dataKeranjangUser)) : ?>
                                                        <?php continue; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <a href="javascript:0" data-id="<?php echo $rowDataSeluruhBaju['idBaju']; ?>" class="btn btn-primary tambahKeranjang mb-1">
                                                    Masukkan Keranjang
                                                </a>
                                            <?php endif; ?>
                                            <!-- simpan -->
                                            <?php if (!empty($dataBajuFavorite)) : ?>
                                                <?php foreach ($dataBajuFavorite as $key => $rowDataBajuFavorite) : ?>
                                                    <?php if ($rowDataSeluruhBaju['idBaju'] == $rowDataBajuFavorite['idBaju']) : ?>
                                                        <button class="btn btn-danger">
                                                            <i class="fa fa-heart" aria-hidden="true"></i> Tersimpan
                                                        </button>
                                                        <?php break; ?>
                                                    <?php elseif ($rowDataSeluruhBaju['idBaju'] != $rowDataBajuFavorite['idBaju'] && $key == count($dataBajuFavorite) - 1) : ?>
                                                        <a href="javascript:0" data-id="<?php echo $rowDataSeluruhBaju['idBaju']; ?>" class="btn btn-light border-dark simpanBaju">
                                                            <i class="fa fa-heart" aria-hidden="true"></i> Simpan
                                                        </a>
                                                    <?php elseif ($rowDataSeluruhBaju['idBaju'] != $rowDataBajuFavorite['idBaju'] && $key < count($dataBajuFavorite)) : ?>
                                                        <?php continue; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <a href="javascript:0" data-id="<?php echo $rowDataSeluruhBaju['idBaju']; ?>" class="btn btn-light border-dark simpanBaju">
                                                    <i class="fa fa-heart" aria-hidden="true"></i> Simpan
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
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
                                <div class="col-sm-10">
                                    <div class="form-row align-items-center">
                                        <div class="col-sm-6 my-1 text-center">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Terkecil</label>
                                                <input type="text" class="form-control" name="hargaTerkecil" value="<?php echo $hargaMinProduk; ?>" id="formGroupExampleInput" placeholder="<?php echo $hargaMinProduk; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 my-1 text-center">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Terbesar</label>
                                                <input type="text" class="form-control" name="hargaTerbesar" value="<?php echo $hargaMaxProduk; ?>" id="formGroupExampleInput" placeholder="<?php echo $hargaMaxProduk; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="populer" value="populer" id="inputTerpopuler">
                                            <label class="custom-control-label" for="inputTerpopuler">Terpopuler</label>
                                        </div>
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
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.css">
    <title>Edit Produk</title>
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

    <div class="container mt-5 sticky-top" style="top: 55px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <h5 class="card-header text-light bg-primary">
                <div class="row">
                    <div class="col-4">
                        <a href="index.php?view=admin&page=produk&aksi=view" class="btn btn-light float-left">Kembali</a>
                    </div>
                    <div class="col-4 align-middle">Edit Produk</div>
                </div>
            </h5>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <img src="<?php echo $BASE_URL; ?>/assets/img/tersimpan/<?php echo $dataBaju['gambar_baju']; ?>" id="imagePreview" class="rounded img-fluid img-thumbnail" alt="Image Preview">
                    </div>
                    <div class="col-7">
                        <form action="index.php?view=admin&page=produk&aksi=update" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="idBaju" id="inputIdBaju" value="<?php echo $dataBaju['id_baju']; ?>">
                            <input type="hidden" class="form-control" name="gambarLama" id="inputGambarLama" value="<?php echo $dataBaju['gambar_baju']; ?>">
                            <div class="form-group row mt-2">
                                <label for="inputJenis" class="col-sm-4 col-form-label">Masukkan Jenis</label>
                                <div class="col-sm-8 mb-2">
                                    <select class="custom-select" name="jenis">
                                        <option>Pilih Jenis</option>
                                        <?php foreach ($dataJenisBaju as $rowDataJenisBaju) : ?>
                                            <?php if ($dataBaju['id_jenis_baju'] == $rowDataJenisBaju['idJenisBaju']) : ?>
                                                <option selected value="<?php echo $rowDataJenisBaju['idJenisBaju']; ?>"><?php echo $rowDataJenisBaju['jenisBaju']; ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $rowDataJenisBaju['idJenisBaju']; ?>"><?php echo $rowDataJenisBaju['jenisBaju']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="inputKategori" class="col-sm-4 col-form-label">Masukkan Kategori</label>
                                <div class="col-sm-8 mb-2">
                                    <select class="custom-select" name="kategori">
                                        <option>Pilih Kategori</option>
                                        <?php foreach ($dataKategoriBaju as $rowDataKategoriBaju) : ?>
                                            <?php if ($dataBaju['id_kategori_baju'] == $rowDataKategoriBaju['idKategoriBaju']) : ?>
                                                <option selected value="<?php echo $rowDataKategoriBaju['idKategoriBaju']; ?>"><?php echo $rowDataKategoriBaju['kategoriBaju']; ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $rowDataKategoriBaju['idKategoriBaju']; ?>"><?php echo $rowDataKategoriBaju['kategoriBaju']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="inputMerek" class="col-sm-4 col-form-label">Masukkan Merek</label>
                                <div class="col-sm-8 mb-2">
                                    <select class="custom-select" name="merek">
                                        <option>Pilih Merek</option>
                                        <?php foreach ($dataMerekBaju as $rowDataMerekBaju) : ?>
                                            <?php if ($dataBaju['id_merek_baju'] == $rowDataMerekBaju['idMerekBaju']) : ?>
                                                <option selected value="<?php echo $rowDataMerekBaju['idMerekBaju']; ?>"><?php echo $rowDataMerekBaju['merekBaju']; ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $rowDataMerekBaju['idMerekBaju']; ?>"><?php echo $rowDataMerekBaju['merekBaju']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="inputUkuran" class="col-sm-4 col-form-label">Masukkan Ukuran</label>
                                <div class="col-sm-8 mb-2">
                                    <select class="custom-select" name="ukuran">
                                        <option>Pilih Ukuran</option>
                                        <?php foreach ($dataUkuranBaju as $rowDataUkuranBaju) : ?>
                                            <?php if ($dataBaju['id_ukuran_baju'] == $rowDataUkuranBaju['idUkuranBaju']) : ?>
                                                <option selected value="<?php echo $rowDataUkuranBaju['idUkuranBaju']; ?>"><?php echo $rowDataUkuranBaju['ukuranBaju']; ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $rowDataUkuranBaju['idUkuranBaju']; ?>"><?php echo $rowDataUkuranBaju['ukuranBaju']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="inputDeskripsi" class="col-sm-4 col-form-label">Masukkan Deskripsi</label>
                                <div class="col-sm-8 mb-2">
                                    <div class="form-group">
                                        <textarea class="form-control" name="deskripsi" id="inputDeskripsi" rows="3"><?php echo $dataBaju['deskripsi_baju']; ?></textarea>
                                    </div>
                                </div>
                                <label for="inputStok" class="col-sm-4 col-form-label">Masukkan Stok</label>
                                <div class="col-sm-8 mb-2">
                                    <input type="text" class="form-control" name="stok" id="inputStok" value="<?php echo $dataBaju['jumlah_baju']; ?>">
                                </div>
                                <label for="inputHarga" class="col-sm-4 col-form-label">Masukkan Harga</label>
                                <div class="col-sm-8 mb-2">
                                    <input type="text" class="form-control" name="harga" id="inputHarga" value="<?php echo $dataBaju['harga_baju']; ?>">
                                </div>
                                <label for="inputGambar" class="col-sm-4 col-form-label">Masukkan Gambar</label>
                                <div class="col-sm-8 mb-2">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="inputGambar">
                                        <label class="custom-file-label" for="inputGambar">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </form>
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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Dashboard Transaksi</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="navbar-brand mb-0 h1" href="index.php?page=utama&aksi=view">Belanja Baju Online</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container mt-5 sticky-top" style="top: 50px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <h5 class="card-header h3">Transaksi</h5>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <?php foreach ($dataCheckout as $rowDataCheckout) : ?>
                            <div class="card mb-2">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row justify-content-center" style="height: 15rem;">
                                            <div class="col-4 text-center">
                                                <img src="<?php echo $BASE_URL; ?>/assets/img/<?php echo $rowDataCheckout['gambarBaju']; ?>" class="rounded my-auto" style="width: 80%;" alt="Image Preview">
                                            </div>
                                            <div class="col-7">
                                                <div class="card" style="height: 100%;">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $rowDataCheckout['namaProduk']; ?></h5>
                                                        <p class="card-text"><?php echo $rowDataCheckout['detailProduk']; ?>.
                                                        </p>
                                                        <blockquote class="blockquote font-weight-bold">
                                                            <p class="mb-0">Rp. <span class="hargaBaju"><?php echo $rowDataCheckout['hargaBaju']; ?></span></p>
                                                        </blockquote>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-inline">
                                                                    <label for="txtJumlah" class="mr-2">jumlah</label>
                                                                    <input type="text" class="form-control text-center jumlahBaju" style="width: 4rem;" value="<?php echo $rowDataCheckout['jumlahPembelian']; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col text-center">
                                                                <span class="text-danger">: Total Harga :</span>
                                                                <blockquote class="blockquote font-weight-bold text-danger">
                                                                    <p class="mb-0">Rp. <span class="hargaBaju"><?php echo $rowDataCheckout['totalHarga']; ?></span></p>
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-inline mb-2">
                                    <label for="txtAlamat" class="mr-2">Alamat</label>
                                    <input type="text" class="form-control text-center" id="txtAlamat" name="alamat" value="<?php echo $dataUser['alamat']; ?>" disabled>
                                </div>
                                <div class="form-inline mb-2">
                                    <label for="txtKota" class="mr-2">Kota</label>
                                    <input type="text" class="form-control text-center" id="txtKota" name="kota" value="<?php echo $dataUser['nama_kota']; ?>" disabled>
                                </div>
                                <form action="index.php?page=transaksi&aksi=update" method="post">
                                    <input type="hidden" name="idUser" value="<?php echo $dataUser['id_user']; ?>">
                                    <div class="form-inline mb-2">
                                        <label for="txtJarak" class="mr-2">Jarak</label>
                                        <input type="text" class="form-control text-center" id="txtJarak" name="jarak" placeholder="Masukkan Jarak">
                                        <label class="ml-2">Km</label>
                                    </div>
                                    <div class="form-inline mb-2">
                                        <label for="txtJasaPengiriman" class="mr-2">Kurir</label>
                                        <select class="custom-select form-control" name="jasaPengiriman" id="jasaPengiriman">
                                            <option selected>Pilih Jasa</option>
                                            <?php foreach ($dataKurir as $rowDataKurir) : ?>
                                                <option value="<?php echo $rowDataKurir['id_kurir']; ?>">
                                                    <?php echo $rowDataKurir['jasa_kurir']; ?> | <?php echo $rowDataKurir['biaya_jasa_kurir']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <span class="font-italic">Total Seluruh Harga Produk</span></br>
                                    <div class="font-weight-bold text-right">
                                        Rp. <span id="totalHargaCheckout"><?php echo $totalHargaCheckout[0]['totalHarga']; ?></span>
                                    </div>
                                    <span class="font-italic">Biaya Pengiriman</span></br>
                                    <div class="font-weight-bold text-right">
                                        Rp. <span id="totalPengiriman">0</span>
                                    </div>
                                    <hr>
                                    <p class="mt-3 h5 text-center">Total Harga</p>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="h4 text-center">Rp. <span id="totalHarga">0</span></p>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block mt-3">
                                        <span class="h5">Buat Pesanan</span>
                                    </button>
                                </form>
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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Dashboard Favorite</title>
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
                        <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION['user']['id_user']; ?>">
                        <?php echo $_SESSION['user']['username']; ?>
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
                <a href="index.php?page=pembelian&aksi=view" class="btn btn-dark mr-3 my-2 my-sm-0">
                    Pembelian
                </a>
            </form>
        </div>
    </nav>

    <div class="container mt-5 sticky-top" style="top: 50px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <h5 class="card-header h3">Favorite</h5>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-center">
                    <?php if (!empty($dataBajuFavorite)) : ?>
                        <?php foreach ($dataBajuFavorite as $row) : ?>
                            <div class="card mb-4" style="width: 12rem;">
                                <img class="card-img-top img-thumbnail" src="<?php echo $BASE_URL; ?>/assets/img/tersimpan/<?php echo $row['gambarProduk']; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['namaProduk']; ?></h5>
                                    <p class="card-text"><?php echo $row['detailProduk']; ?>.
                                    </p>
                                </div>
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item h6 bg-info text-white">
                                        Stok <?php echo $row['stok']; ?>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item h5 bg-dark text-white">
                                        Rp. <?php echo $row['hargaProduk']; ?>
                                    </li>
                                </ul>
                                <div class="card-footer">
                                    <a href="index.php?page=favorite&aksi=delete&idWishlist=<?php echo $row['idWishlist']; ?>" class="btn btn-danger btn-block">Hapus</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="alert alert-primary text-center h5" role="alert">
                            <i class="fa fa-heart" aria-hidden="true"></i>&nbsp;<i class="fa fa-heart" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;<i class="fa fa-smile-o" aria-hidden="true"></i>
                            &nbsp;&nbsp;Favoritemu Masih Kosong&nbsp;&nbsp;
                            <i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;<i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-heart" aria-hidden="true"></i>&nbsp;<i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
                    <?php endif; ?>
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
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
                            <th scope="col" class="align-middle" style="width: 5%;">No. </th>
                            <th scope="col" class="align-middle" style="width: 12%;">Tanggal</th>
                            <th scope="col" class="align-middle" style="width: 13%;">Total Pembelian</th>
                            <th scope="col" class="align-middle" style="width: 70%;">Detail Pembelian</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        <?php if (!empty($dataTransaksi)) : ?>
                            <?php
                            $no = 1;
                            foreach ($dataTransaksi as $rowDataTransaksi) : ?>
                                <tr>
                                    <th scope="row" class="text-center align-middle"><?php echo $no++; ?>.</th>
                                    <td class="align-middle text-center">
                                        <?php
                                        $namaBulan = "";
                                        $bulan = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                                        $data = explode(" ", $rowDataTransaksi['tanggalTransaksi']);
                                        $tanggal = explode("-", $data[0]);
                                        for ($i = 1; $i < count($bulan); $i++) {
                                            if ($tanggal[1] >= 10 && $tanggal[1] == $i) {
                                                $namaBulan = $bulan[$i];
                                                break;
                                            } elseif ($tanggal[1] < 10 && substr($tanggal[1], 1) == $i) {
                                                $namaBulan = $bulan[$i];
                                                break;
                                            }
                                        }
                                        echo $tanggal[2] . "-" . $namaBulan . "-" . $tanggal[0];
                                        ?>
                                        </br>Waktu</br>
                                        <?php echo $data[1]; ?>
                                    </td>
                                    <td class="align-middle text-center font-weight-bold">Rp. <?php echo $rowDataTransaksi['totalPembelian']; ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-8">
                                                <table class="table table-sm table-bordered">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th scope="col" style="width: 30%;">Barang</th>
                                                            <th scope="col" style="width: 15%;">Jumah</th>
                                                            <th scope="col" style="width: 25%;">Harga</th>
                                                            <th scope="col" style="width: 30%;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-light text-center">
                                                        <?php foreach ($detailDataTransaksi as $rowDetailDataTransaksi) : ?>
                                                            <?php if ($rowDetailDataTransaksi['idTransaksi'] == $rowDataTransaksi['idTransaksi']) : ?>
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <img class="card-img-top img-thumbnail" src="<?php echo $BASE_URL; ?>/assets/img/tersimpan/<?php echo $rowDetailDataTransaksi['gambarBaju']; ?>" style="width: 50%;" alt="Card image cap"></br>
                                                                        <?php echo $rowDetailDataTransaksi['namaProduk']; ?>
                                                                    </td>
                                                                    <td class="align-middle"><?php echo $rowDetailDataTransaksi['jumlahBaju']; ?></td>
                                                                    <td class="align-middle">Rp. <?php echo $rowDetailDataTransaksi['hargaBaju']; ?></td>
                                                                    <td class="align-middle">Rp. <?php echo $rowDetailDataTransaksi['totalHarga']; ?></td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <tr class="table-info">
                                                            <th scope="col" colspan="3">
                                                                <span class="float-right">total harga : </span>
                                                            </th>
                                                            <th scope="col">Rp. <?php echo $rowDataTransaksi['totalHargaPembelian']; ?></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <span>
                                                            Alamat : <?php echo $rowDataTransaksi['alamatPengiriman']; ?></br>
                                                            Jarak : <?php echo $rowDataTransaksi['jarakPengiriman']; ?> km</br>
                                                            jasa pengiriman : </br><mark><?php echo $rowDataTransaksi['jasaKurir']; ?></mark></br>
                                                            biaya pengiriman : <?php echo $rowDataTransaksi['biayaPengiriman']; ?></br>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="alert alert-primary text-center h5" role="alert">
                                <i class="fa fa-heart" aria-hidden="true"></i>&nbsp;<i class="fa fa-heart" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;<i class="fa fa-smile-o" aria-hidden="true"></i>
                                &nbsp;&nbsp;Kamu belum Belanja sama Sekali&nbsp;&nbsp;
                                <i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;<i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-heart" aria-hidden="true"></i>&nbsp;<i class="fa fa-heart" aria-hidden="true"></i>
                            </div>
                        <?php endif; ?>
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
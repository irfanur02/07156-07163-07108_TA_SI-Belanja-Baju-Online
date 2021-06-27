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
                            <input type="hidden" class="form-control ml-2" id="txtIdUser" name="idUser" value="<?php echo $dataProfil['id_user']; ?>">
                            <input type="hidden" class="form-control ml-2" id="txtIdOwnerUser" name="idOwnerUser" value="<?php echo $dataProfil['id_user']; ?>">
                            <div class="card-body">
                                <div class="row ml-1">
                                    <div class="form-inline">
                                        <label for="txtNama">Nama : </label>
                                        <input type="text" class="form-control ml-2" id="txtNama" name="nama" value="<?php echo $dataProfil['nama']; ?>">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtTanggallahir">Tanggal Lahir : </label>
                                        <input type="date" class="form-control ml-2" id="txtTanggallahir" name="tanggalLahir" value="<?php echo $dataProfil['tanggal_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label>Jenis Kelamin : </label>
                                        <div class="form-check ml-2">
                                            <input class="form-check-input" type="radio" name="jenisKelamin" id="rbLaki" value="L" <?php echo $dataProfil['jenis_kelamin'] == 'L' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="rbLaki">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check ml-2">
                                            <input class="form-check-input" type="radio" name="jenisKelamin" id="rbPerempuan" value="P" <?php echo $dataProfil['jenis_kelamin'] == 'P' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="rbPerempuan">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtAlamat">Alamat : </label>
                                        <input type="text" class="form-control ml-2" id="txtAlamat" name="alamat" value="<?php echo $dataProfil['alamat']; ?>">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtKota">Kota : </label>
                                        <select class="custom-select form-control ml-2" id="selectKota" name="kota">
                                            <option>Pilih Kota</option>
                                            <?php foreach ($dataKota as $row) : ?>
                                                <?php if ($dataProfil['id_kota'] == $row['id_kota']) : ?>
                                                    <option selected value="<?php echo $row['id_kota']; ?>"><?php echo $row['nama_kota']; ?></option>
                                                <?php else : ?>
                                                    <option value="<?php echo $row['id_kota']; ?>"><?php echo $row['nama_kota']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtNoTelp">No. Telp : </label>
                                        <input type="text" class="form-control ml-2" id="txtNoTelp" name="noTelp" value="<?php echo $dataProfil['no_telp']; ?>">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtEmail">Email : </label>
                                        <input type="email" class="form-control ml-2" id="txtEmail" name="email" value="<?php echo $dataProfil['email']; ?>">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtUsername">Username : </label>
                                        <input type="text" class="form-control ml-2" id="txtUsername" name="username" value="<?php echo $dataProfil['username']; ?>">
                                    </div>
                                </div>
                                <div class="row ml-1 mt-2">
                                    <div class="form-inline">
                                        <label for="txtPassword">Password : </label>
                                        <input type="password" class="form-control ml-2" id="txtPassword" name="password" value="<?php echo $dataProfil['password']; ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3" style="display: none;" id="btnUpdate">Update</button>
                            <button type="button" class="btn btn-secondary mb-3" style="display: none;" id="btnBatalUpdate">Batal</button>
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
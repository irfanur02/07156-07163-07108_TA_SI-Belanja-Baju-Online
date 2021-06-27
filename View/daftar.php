<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Daftar Akun</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <a class="navbar-brand mb-0 h1" href="index.php?page=utama&aksi=view">Belanja Baju Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container">
        <div class="card mt-5 mx-auto" style="width: 40rem; top: 35px;">
            <div class="card-body">
                <form action="index.php?page=daftar&aksi=store" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="inputNama">Nama</label>
                                <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="inputTglLahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="inputTglLahir" name="tglLahir">
                            </div>
                            <div class="form-group">
                                <label for="inputJenisKelamin">Jenis Kelamin : </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisKelamin" id="rbLaki" value="L">
                                    <label class="form-check-label" for="rbLaki">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisKelamin" id="rbPerempuan" value="P">
                                    <label class="form-check-label" for="rbPerempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputKota">Kota</label>
                                <select class="form-control" id="inputKota" name="kota">
                                    <option selected>Pilih Kota</option>
                                    <?php foreach ($dataKota as $row) : ?>
                                        <option value="<?php echo $row['id_kota']; ?>"><?php echo $row['nama_kota']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAlamat">Alamat</label>
                                <input type="text" class="form-control" id="inputAlamat" name="alamat" placeholder="Masukkan Alamat">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group">
                                <label for="inputNoTelp">No. Telepon</label>
                                <input type="text" class="form-control" id="inputNoTelp" name="noTelp" placeholder="Masukkan No. Telepon">
                            </div>
                            <div class="form-group">
                                <label for="inputUsername">Username</label>
                                <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Masukkan Username">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Masukkan Password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="btnDaftar">Daftar</button>
                </form>
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
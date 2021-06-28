<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/font-awesome-4.7.0/css/font-awesome.css">
    <title>Laporan</title>
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

    <div class="container mt-5 sticky-top" style="top: 53px;">
        <div class="card text-center mt-3 border border-light" style="width: 100%;">
            <h5 class="card-header text-light bg-primary">
                Laporan</br>
                <span class="font-weight-normal">
                    <?php if (isset($judul)) : ?>
                        <?php if ($judul == "berdasarkanUser") : ?>
                            Berdasarkan User
                        <?php elseif ($judul == "semuaTransaksi") : ?>
                            Semua Transaksi
                        <?php endif; ?>
                    <?php endif; ?>
                </span>
            </h5>
            <div class="card-body text-dark font-weight-bold" style="overflow-x: auto;">
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-dark btn-sm btn-block mb-3" data-toggle="collapse" data-target="#collapseCariKota" aria-expanded="true" aria-controls="collapseOne">Filter
                            Laporan
                        </button>
                    </div>
                </div>
                <div id="accordion">
                    <div class="card border border-dark rounded">
                        <div id="collapseCariKota" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body bg-light text-dark font-weight-normal">
                                <div class="row">
                                    <div class="col-3">
                                        <select class="custom-select" name="pilihLaporan" id="selectPilihLaporan">
                                            <option selected>Pilih Laporan</option>
                                            <option value="1">Data Seluruh Transaksi</option>
                                            <option value="2">Data Transaksi Tiap User</option>
                                        </select>
                                    </div>
                                    <div class="col-9">
                                        <!-- Data Seluruh Transaksi -->
                                        <form action="index.php?view=admin&page=laporan&aksi=semuaTransaksi" method="post" id="laporanSeluruhTransaksi">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="custom-control custom-checkbox mx-auto w-50">
                                                        <input type="checkbox" class="custom-control-input" id="cbTanggal" name="periodeTanggal" value="periodeTanggal">
                                                        <label class="custom-control-label float-left" for="cbTanggal">
                                                            Periode Tanggal
                                                        </label>
                                                    </div>
                                                    <div class="form-row mt-1">
                                                        <div class="col-6">
                                                            <input type="date" name="tglAwal" id="inputTglAwal" class="form-control" value="<?php echo date("Y-m-d"); ?>" disabled>
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="date" name="tglAkhir" id="inputTglAkhir" class="form-control" value="<?php echo date("Y-m-d"); ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" col">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="cbTotPemTertinggi" name="totPemTertinggi" value="berdasarkanTransaksiTerbanyak">
                                                        <label class="custom-control-label float-left" for="cbTotPemTertinggi">Urutkan
                                                            Berdasarkan Transaksi Terbanyak
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="justify-content-center mt-3">
                                                <button type="submit" class="btn btn-primary">Tampilkan atau Terapkan
                                                </button>
                                            </div>
                                        </form>
                                        <!-- Data Transaksi Tiap User -->
                                        <form action="index.php?view=admin&page=laporan&aksi=transaksiByUser" method="post" id="laporanTransaksiTiapUser">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="rbCariUser" name="transaksiTiapUser" value="berdasarkanNama" class="custom-control-input">
                                                        <label class="custom-control-label float-left" for="rbCariUser">
                                                            Cari Berdasarkan Nama User
                                                        </label>
                                                        <input type="text" class="form-control" name="namaUser" id="namaUser" placeholder="Masukkan Nama User">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="rbTotPemTertinggi" name="transaksiTiapUser" value="berdasarkanTransaksiTerbanyak">
                                                        <label class="custom-control-label float-left" for="rbTotPemTertinggi">Urutkan
                                                            Berdasarkan Transaksi Terbanyak
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="justify-content-center mt-3">
                                                <button type="submit" class="btn btn-primary">Tampilkan atau Terapkan</button>
                                                <button type="button" class="btn btn-dark" id="btnReset">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" id="kontenLaporan" style="margin-top: 20px;">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <?php if (isset($data) == "periodeTanggal") : ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <span>Periode Tanggal :
                                <?php
                                $namaBulan = "";
                                $bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                $dataTanggal = explode("-", $tglAwal);
                                for ($i = 1; $i < count($bulan); $i++) {
                                    if ($dataTanggal[1] >= 10 && $dataTanggal[1] == $i) {
                                        $namaBulan = $bulan[$i];
                                        break;
                                    } elseif ($dataTanggal[1] < 10 && substr($dataTanggal[1], 1) == $i) {
                                        $namaBulan = $bulan[$i];
                                        break;
                                    }
                                }
                                echo $dataTanggal[2] . " " . $namaBulan . " " . $dataTanggal[0];
                                ?>
                                sampai
                                <?php
                                $namaBulan = "";
                                $bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                $dataTanggal = explode("-", $tglAkhir);
                                for ($i = 1; $i < count($bulan); $i++) {
                                    if ($dataTanggal[1] >= 10 && $dataTanggal[1] == $i) {
                                        $namaBulan = $bulan[$i];
                                        break;
                                    } elseif ($dataTanggal[1] < 10 && substr($dataTanggal[1], 1) == $i) {
                                        $namaBulan = $bulan[$i];
                                        break;
                                    }
                                }
                                echo $dataTanggal[2] . " " . $namaBulan . " " . $dataTanggal[0];
                                ?>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($dataLaporan)) : ?>
                    <?php if (!empty($dataLaporan)) : ?>
                        <table class="table table-bordered">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope="col" style="width: 10%;">No. </th>
                                    <th scope="col" style="width: 40%;"><?php echo $th; ?></th>
                                    <th scope="col" style="width: 30%;">Jumlah Transaksi</th>
                                    <th scope="col" style="width: 30%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-light">
                                <?php
                                $no = 1;
                                foreach ($dataLaporan as $rowDataLaporan) : ?>
                                    <tr>
                                        <th scope="row" class="text-center align-middle"><?php echo $no++; ?>.</th>
                                        <td class="text-center align-middle font-weight-bold">
                                            <?php if ($th == "Nama User") : ?>
                                                <?php echo $rowDataLaporan['namaUser']; ?>
                                            <?php elseif ($th == "Tanggal Transaksi") : ?>
                                                <?php
                                                $namaBulan = "";
                                                $bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                                $datatanggalTransaksi = explode(" ", $rowDataLaporan['tanggalTransaksi']);
                                                $tanggal = explode("-", $datatanggalTransaksi[0]);
                                                for ($i = 1; $i < count($bulan); $i++) {
                                                    if ($tanggal[1] >= 10 && $tanggal[1] == $i) {
                                                        $namaBulan = $bulan[$i];
                                                        break;
                                                    } elseif ($tanggal[1] < 10 && substr($tanggal[1], 1) == $i) {
                                                        $namaBulan = $bulan[$i];
                                                        break;
                                                    }
                                                }
                                                echo $tanggal[2] . " " . $namaBulan . " " . $tanggal[0];
                                                ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php if ($th == "Nama User") : ?>
                                                <strong>Jumlah : <?php echo $rowDataLaporan['jumlahTransaksi']; ?></strong>
                                                <ul class="text-danger">
                                                    <li>Di Proses : <?php echo $rowDataLaporan['diproses']; ?></li>
                                                    <li>Dikirim : <?php echo $rowDataLaporan['dikirim']; ?></li>
                                                    <li>Diterima : <?php echo $rowDataLaporan['diterima']; ?></li>
                                                </ul>
                                            <?php elseif ($th == "Tanggal Transaksi") : ?>
                                                <div class="font-weight-bold text-center"><?php echo $rowDataLaporan['jumlahTransaksi']; ?></div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php if ($th == "Nama User") : ?>
                                                <a href="index.php?view=admin&page=laporan&aksi=detailLaporanUserDiproses&id=<?php echo $rowDataLaporan['idUser']; ?>" class="btn btn-warning">Detail</a>
                                            <?php elseif ($th == "Tanggal Transaksi") : ?>
                                                <a href="index.php?view=admin&page=laporan&aksi=detailLaporanByTanggal&tanggal=<?php echo $datatanggalTransaksi[0]; ?>" class="btn btn-warning">Detail</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="alert alert-light text-dark text-center" role="alert">
                            Tidak ada Laporan Transaksi pada tanggal
                            <?php
                            $namaBulan = "";
                            $bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            $dataTanggal = explode("-", $tglAwal);
                            for ($i = 1; $i < count($bulan); $i++) {
                                if ($dataTanggal[1] >= 10 && $dataTanggal[1] == $i) {
                                    $namaBulan = $bulan[$i];
                                    break;
                                } elseif ($dataTanggal[1] < 10 && substr($dataTanggal[1], 1) == $i) {
                                    $namaBulan = $bulan[$i];
                                    break;
                                }
                            }
                            echo $dataTanggal[2] . " " . $namaBulan . " " . $dataTanggal[0];
                            ?>
                            sampai
                            <?php
                            $namaBulan = "";
                            $bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            $dataTanggal = explode("-", $tglAkhir);
                            for ($i = 1; $i < count($bulan); $i++) {
                                if ($dataTanggal[1] >= 10 && $dataTanggal[1] == $i) {
                                    $namaBulan = $bulan[$i];
                                    break;
                                } elseif ($dataTanggal[1] < 10 && substr($dataTanggal[1], 1) == $i) {
                                    $namaBulan = $bulan[$i];
                                    break;
                                }
                            }
                            echo $dataTanggal[2] . " " . $namaBulan . " " . $dataTanggal[0];
                            ?> !
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
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
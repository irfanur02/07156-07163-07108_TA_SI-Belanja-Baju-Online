<?php

require_once("Koneksi.php");

$BASE_URL = "http://localhost/projek-belanjaBajuOnline";

//memanggil model
require_once("Model/TransaksiModel.php");
require_once("Model/UserModel.php");
require_once("Model/KurirModel.php");
require_once("Model/ProdukModel.php");
require_once("Model/MerekModel.php");
require_once("Model/JenisModel.php");
require_once("Model/KategoriModel.php");
require_once("Model/UkuranModel.php");
require_once("Model/FavoriteModel.php");
require_once("Model/LaporanModel.php");
require_once("Model/AuthModel.php");
require_once("Model/KotaModel.php");
require_once("Model/StatusModel.php");

//memanggil controller
require_once("Controller/TransaksiController.php");
require_once("Controller/ProdukController.php");
require_once("Controller/FavoriteController.php");
require_once("Controller/LaporanController.php");
require_once("Controller/AuthController.php");
require_once("Controller/UserController.php");
require_once("Controller/DashboardController.php");
require_once("Controller/StatusController.php");
require_once("Controller/JenisController.php");
require_once("Controller/KategoriController.php");
require_once("Controller/MerekController.php");
require_once("Controller/UkuranController.php");
require_once("Controller/KotaController.php");
require_once("Controller/KurirController.php");

if (isset($_GET['view'])) {
    $view = $_GET['view'];
    session_start();

    if ($view == "admin") {
        if (isset($_GET['page']) && isset($_GET['aksi'])) {
            $page = $_GET['page'];
            $aksi = $_GET['aksi'];

            if ($page == "auth") {
                $admin = new AuthController();
                if ($aksi == "login") {
                    $admin->prosesLoginAdmin();
                } elseif ($aksi == "logout") {
                    $admin->prosesLogoutAdmin();
                }
            } elseif ($page == "dashboard") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $dashboard = new DashboardController();
                    if ($aksi == "view") {
                        $dashboard->view();
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "produk") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $produk = new ProdukController();
                    if ($aksi == "view") {
                        $produk->viewAdmin();
                    } elseif ($aksi == "filterPopuler") {
                        $produk->filterProduk("populer");
                    } elseif ($aksi == "filterFavorite") {
                        $produk->filterProduk("favorite");
                    } elseif ($aksi == "tambah") {
                        $produk->tambah();
                    } elseif ($aksi == "edit") {
                        $produk->edit();
                    } elseif ($aksi == "store") {
                        $produk->store();
                    } elseif ($aksi == "update") {
                        $produk->update();
                    } elseif ($aksi == "adminFilterPencarian") {
                        $produk->adminFilterPencarian();
                    } elseif ($aksi == "adminCariBaju") {
                        $produk->adminCariBaju();
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "jenisBaju") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $jenis = new JenisController();
                    if ($aksi == "view") {
                        $jenis->view();
                    } elseif ($aksi == "tambah") {
                        $jenis->tambah();
                    } elseif ($aksi == "edit") {
                        $jenis->edit();
                    } elseif ($aksi == "store") {
                        $jenis->store();
                    } elseif ($aksi == "update") {
                        $jenis->update();
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "kategoriBaju") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $kategori = new KategoriController();
                    if ($aksi == "view") {
                        $kategori->view();
                    } elseif ($aksi == "tambah") {
                        $kategori->tambah();
                    } elseif ($aksi == "edit") {
                        $kategori->edit();
                    } elseif ($aksi == "store") {
                        $kategori->store();
                    } elseif ($aksi == "update") {
                        $kategori->update();
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "merekBaju") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $merek = new MerekController();
                    if ($aksi == "view") {
                        $merek->view();
                    } elseif ($aksi == "tambah") {
                        $merek->tambah();
                    } elseif ($aksi == "edit") {
                        $merek->edit();
                    } elseif ($aksi == "store") {
                        $merek->store();
                    } elseif ($aksi == "update") {
                        $merek->update();
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "ukuranBaju") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $ukuran = new UkuranController();
                    if ($aksi == "view") {
                        $ukuran->view();
                    } elseif ($aksi == "tambah") {
                        $ukuran->tambah();
                    } elseif ($aksi == "edit") {
                        $ukuran->edit();
                    } elseif ($aksi == "store") {
                        $ukuran->store();
                    } elseif ($aksi == "update") {
                        $ukuran->update();
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "statusPembelian") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $statusPembelian = new StatusController();
                    if ($aksi == "view") {
                        $statusPembelian->view();
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "kota") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $kota = new KotaController();
                    if ($aksi == "view") {
                        $kota->view();
                    } elseif ($aksi == "tambah") {
                        $kota->tambah();
                    } elseif ($aksi == "edit") {
                        $kota->edit();
                    } elseif ($aksi == "store") {
                        $kota->store();
                    } elseif ($aksi == "update") {
                        $kota->update();
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "kurir") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $kurir = new KurirController();
                    if ($aksi == "view") {
                        $kurir->view();
                    } elseif ($aksi == "sortHarga") {
                        $kurir->sortHarga();
                    } elseif ($aksi == "tambah") {
                        $kurir->tambah();
                    } elseif ($aksi == "edit") {
                        $kurir->edit();
                    } elseif ($aksi == "store") {
                        $kurir->store();
                    } elseif ($aksi == "update") {
                        $kurir->update();
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "permintaan") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $permintaan = new TransaksiController();
                    if ($aksi == "view") {
                        $permintaan->pembelianTerproses();
                    } elseif ($aksi == "terimaPermintaan") {
                        $permintaan->updateStatusTransaksi(3);
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "laporan") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    $laporan = new LaporanController();
                    if ($aksi == "view") {
                        $laporan->index();
                    } elseif ($aksi == "detailLaporanUserDiproses") {
                        $laporan->getLaporanUser("Diproses");
                    } elseif ($aksi == "detailLaporanUserDikirim") {
                        $laporan->getLaporanUser("Dikirim");
                    } elseif ($aksi == "detailLaporanUserDiterima") {
                        $laporan->getLaporanUser("Diterima");
                    } elseif ($aksi == "semuaTransaksi") {
                        $laporan->getLaporanSemuaTransaksi();
                    } elseif ($aksi == "detailLaporanByTanggal") {
                        $laporan->getDetailLaporanByTanggal();
                    } elseif ($aksi == "transaksiByUser") {
                        $laporan->getLaporanTiapUser();
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            }
        } else {
            require_once("View/admin/login.php");
        }
    } else {
        header("location: index.php?view=admin");
    }
} elseif (isset($_GET['page']) && isset($_GET['aksi'])) {
    session_start();
    $page = $_GET['page'];
    $aksi = $_GET['aksi'];

    if ($page == "utama") {
        $produk = new ProdukController();
        $keranjang = new TransaksiController();
        $favorite = new FavoriteController();
        $auth = new AuthController();
        if ($aksi == "view") {
            $produk->viewUser();
        } elseif ($aksi == "prosesLogin") {
            $auth->prosesLogin();
        } elseif ($aksi == "prosesLogout") {
            $auth->prosesLogout();
        } elseif ($aksi == "tambahKeranjang") {
            $keranjang->storeKeranjang();
        } elseif ($aksi == "simpanBaju") {
            $favorite->store();
        } elseif ($aksi == "filterPencarian") {
            $produk->filterPencarian();
        } elseif ($aksi == "cariBaju") {
            $produk->cariBaju();
        }
    } elseif ($page == "profil") {
        $profil = new UserController();
        if (isset($_SESSION['user'])) {
            if ($aksi == "view") {
                $profil->view();
            } elseif ($aksi == "update") {
                $profil->update();
            }
        } else {
            header("location: index.php?page=utama&aksi=view");
        }
    } elseif ($page == "favorite") {
        $favorite = new FavoriteController();
        if (isset($_SESSION['user'])) {
            if ($aksi == "view") {
                $favorite->view();
            } elseif ($aksi == "delete") {
                $favorite->delete();
            }
        } else {
            header("location: index.php?page=utama&aksi=view");
        }
    } elseif ($page == "historiTransaksi") {
        $histori = new TransaksiController();
        if (isset($_SESSION['user'])) {
            if ($aksi == "view") {
                $histori->getHistoriTransaksi("Diterima");
            }
        } else {
            header("location: index.php?page=utama&aksi=view");
        }
    } elseif ($page == "keranjang") {
        $keranjang = new TransaksiController();
        if (isset($_SESSION['user'])) {
            if ($aksi == "view") {
                $keranjang->getKeranjang();
            } elseif ($aksi == "delete") {
                $keranjang->delete();
            }
        } else {
            header("location: index.php?page=utama&aksi=view");
        }
    } elseif ($page == "pembelian") {
        $pembelian = new TransaksiController();
        if (isset($_SESSION['user'])) {
            if ($aksi == "view") {
                $pembelian->getPembelianTerproses("Diproses");
            } elseif ($aksi == "keadaanTerproses") {
                $pembelian->getPembelianTerproses("Diproses");
            } elseif ($aksi == "keadaanTerkirim") {
                $pembelian->getPembelianTerkirim("Dikirim");
            } elseif ($aksi == "pembelianDiterima") {
                $pembelian->updateStatusTransaksi(4);
            }
        } else {
            header("location: index.php?page=utama&aksi=view");
        }
    } elseif ($page == "transaksi") {
        $transaksi = new TransaksiController();
        if (isset($_SESSION['user'])) {
            if ($aksi == "view") {
                $transaksi->view();
            } elseif ($aksi == "checkoutKeranjang") {
                $transaksi->checkoutKeranjang();
            } elseif ($aksi == "update") {
                $transaksi->update();
            }
        } else {
            header("location: index.php?page=utama&aksi=view");
        }
    } elseif ($page == "daftar") {
        $daftar = new AuthController();
        if ($aksi == "view") {
            $daftar->viewDaftar();
        } elseif ($aksi == "store") {
            $daftar->store();
        }
    }
} else {
    header("location: index.php?page=utama&aksi=view");
}

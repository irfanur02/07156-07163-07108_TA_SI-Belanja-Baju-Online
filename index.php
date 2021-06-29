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

//memanggil controller
require_once("Controller/TransaksiController.php");
require_once("Controller/ProdukController.php");
require_once("Controller/FavoriteController.php");
require_once("Controller/LaporanController.php");
require_once("Controller/AuthController.php");
require_once("Controller/UserController.php");
require_once("Controller/DashboardController.php");

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
                    if ($aksi == "view") {
                        require_once("View/admin/jenis_baju/index.php");
                    } elseif ($aksi == "filterPopuler") {
                        require_once("View/admin/jenis_baju/index.php");
                    } elseif ($aksi == "tambah") {
                        require_once("View/admin/jenis_baju/tambah_jenis_baju.php");
                    } elseif ($aksi == "edit") {
                        require_once("View/admin/jenis_baju/edit_jenis_baju.php");
                    } elseif ($aksi == "store") {
                        require_once("View/admin/jenis_baju/index.php");
                    } elseif ($aksi == "update") {
                        require_once("View/admin/jenis_baju/index.php");
                    } elseif ($aksi == "filter") {
                        require_once("View/admin/jenis_baju/index.php");
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "kategoriBaju") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    if ($aksi == "view") {
                        require_once("View/admin/kategori_baju/index.php");
                    } elseif ($aksi == "filterPopuler") {
                        require_once("View/admin/kategori_baju/index.php");
                    } elseif ($aksi == "tambah") {
                        require_once("View/admin/kategori_baju/tambah_kategori_baju.php");
                    } elseif ($aksi == "edit") {
                        require_once("View/admin/kategori_baju/edit_kategori_baju.php");
                    } elseif ($aksi == "store") {
                        require_once("View/admin/kategori_baju/index.php");
                    } elseif ($aksi == "update") {
                        require_once("View/admin/kategori_baju/index.php");
                    } elseif ($aksi == "filter") {
                        require_once("View/admin/kategori_baju/index.php");
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "merekBaju") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    if ($aksi == "view") {
                        require_once("View/admin/merek_baju/index.php");
                    } elseif ($aksi == "filterPopuler") {
                        require_once("View/admin/merek_baju/index.php");
                    } elseif ($aksi == "tambah") {
                        require_once("View/admin/merek_baju/tambah_merek_baju.php");
                    } elseif ($aksi == "edit") {
                        require_once("View/admin/merek_baju/edit_merek_baju.php");
                    } elseif ($aksi == "store") {
                        require_once("View/admin/merek_baju/index.php");
                    } elseif ($aksi == "update") {
                        require_once("View/admin/merek_baju/index.php");
                    } elseif ($aksi == "filter") {
                        require_once("View/admin/merek_baju/index.php");
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "ukuranBaju") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    if ($aksi == "view") {
                        require_once("View/admin/ukuran_baju/index.php");
                    } elseif ($aksi == "tambah") {
                        require_once("View/admin/ukuran_baju/tambah_ukuran_baju.php");
                    } elseif ($aksi == "edit") {
                        require_once("View/admin/ukuran_baju/edit_ukuran_baju.php");
                    } elseif ($aksi == "store") {
                        require_once("View/admin/ukuran_baju/index.php");
                    } elseif ($aksi == "update") {
                        require_once("View/admin/ukuran_baju/index.php");
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "statusPembelian") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    if ($aksi == "view") {
                        require_once("View/admin/status_pembelian/index.php");
                    } elseif ($aksi == "tambah") {
                        require_once("View/admin/status_pembelian/tambah_status_pembelian.php");
                    } elseif ($aksi == "edit") {
                        require_once("View/admin/status_pembelian/edit_status_pembelian.php");
                    } elseif ($aksi == "store") {
                        require_once("View/admin/status_pembelian/index.php");
                    } elseif ($aksi == "update") {
                        require_once("View/admin/status_pembelian/index.php");
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "kota") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    if ($aksi == "view") {
                        require_once("View/admin/kota/index.php");
                    } elseif ($aksi == "kotaTerbanyak") {
                        require_once("View/admin/kota/index.php");
                    } elseif ($aksi == "tambah") {
                        require_once("View/admin/kota/tambah_kota.php");
                    } elseif ($aksi == "edit") {
                        require_once("View/admin/kota/edit_kota.php");
                    } elseif ($aksi == "store") {
                        require_once("View/admin/kota/index.php");
                    } elseif ($aksi == "update") {
                        require_once("View/admin/kota/index.php");
                    } elseif ($aksi == "filter") {
                        require_once("View/admin/kota/index.php");
                    }
                } else {
                    header("location: index.php?view=admin");
                }
            } elseif ($page == "kurir") {
                if (isset($_SESSION['statusAdmin']) == 'logged') {
                    if ($aksi == "view") {
                        require_once("View/admin/kurir/index.php");
                    } elseif ($aksi == "kurirTerbanyak") {
                        require_once("View/admin/kurir/index.php");
                    } elseif ($aksi == "tambah") {
                        require_once("View/admin/kurir/tambah_kurir.php");
                    } elseif ($aksi == "edit") {
                        require_once("View/admin/kurir/edit_kurir.php");
                    } elseif ($aksi == "store") {
                        require_once("View/admin/kurir/index.php");
                    } elseif ($aksi == "update") {
                        require_once("View/admin/kurir/index.php");
                    } elseif ($aksi == "filter") {
                        require_once("View/admin/kurir/index.php");
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

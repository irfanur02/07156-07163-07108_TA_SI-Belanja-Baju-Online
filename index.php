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

//memanggil controller
require_once("Controller/TransaksiController.php");
require_once("Controller/ProdukController.php");
require_once("Controller/FavoriteController.php");
require_once("Controller/LaporanController.php");

if (isset($_GET['view'])) {
    $view = $_GET['view'];

    if ($view == "admin") {
        if (isset($_GET['page']) && isset($_GET['aksi'])) {
            $page = $_GET['page'];
            $aksi = $_GET['aksi'];

            if ($page == "login") {
                if ($aksi == "prosesLogin") {
                    require_once("View/admin/index.php");
                }
            } elseif ($page == "dashboard") {
                if ($aksi == "view") {
                    require_once("View/admin/index.php");
                }
            } elseif ($page == "produk") {
                if ($aksi == "view") {
                    require_once("View/admin/produk/index.php");
                } elseif ($aksi == "filterPopuler") {
                    require_once("View/admin/produk/index.php");
                } elseif ($aksi == "filterFavorite") {
                    require_once("View/admin/produk/index.php");
                } elseif ($aksi == "filterPopuler") {
                    require_once("View/admin/produk/edit_produk.php");
                } elseif ($aksi == "tambah") {
                    require_once("View/admin/produk/tambah_produk.php");
                } elseif ($aksi == "edit") {
                    require_once("View/admin/produk/edit_produk.php");
                } elseif ($aksi == "store") {
                    require_once("View/admin/produk/index.php");
                } elseif ($aksi == "update") {
                    require_once("View/admin/produk/index.php");
                } elseif ($aksi == "filter") {
                    require_once("View/admin/produk/index.php");
                }
            } elseif ($page == "jenisBaju") {
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
            } elseif ($page == "kategoriBaju") {
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
            } elseif ($page == "merekBaju") {
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
            } elseif ($page == "ukuranBaju") {
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
            } elseif ($page == "statusPembelian") {
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
            } elseif ($page == "kota") {
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
            } elseif ($page == "kurir") {
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
            } elseif ($page == "permintaan") {
                $permintaan = new TransaksiController();
                if ($aksi == "view") {
                    $permintaan->getAllPembelianTerproses();
                } elseif ($aksi == "terimaPermintaan") {
                    $permintaan->updateStatusTransaksi(3);
                }
            } elseif ($page == "laporan") {
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
        if ($aksi == "view") {
            $produk->viewUser();
        } elseif ($aksi == "prosesLogin") {
            require("View/index.php");
        } elseif ($aksi == "prosesLogout") {
            require("View/index.php");
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
        if ($aksi == "view") {
            require_once("View/profil.php");
        } elseif ($aksi == "update") {
            require_once("View/profil.php");
        }
    } elseif ($page == "favorite") {
        if ($aksi == "view") {
            require_once("View/favorite.php");
        } elseif ($aksi == "delete") {
            require_once("View/favorite.php");
        }
    } elseif ($page == "historiTransaksi") {
        $histori = new TransaksiController();
        if ($aksi == "view") {
            $histori->getHistoriTransaksi("Diterima");
        }
    } elseif ($page == "keranjang") {
        $keranjang = new TransaksiController();
        if ($aksi == "view") {
            $keranjang->getKeranjang();
        } elseif ($aksi == "delete") {
            $keranjang->delete();
        }
    } elseif ($page == "pembelian") {
        $pembelian = new TransaksiController();
        if ($aksi == "view") {
            $pembelian->getPembelianTerproses("Diproses");
        } elseif ($aksi == "keadaanTerproses") {
            $pembelian->getPembelianTerproses("Diproses");
        } elseif ($aksi == "keadaanTerkirim") {
            $pembelian->getPembelianTerkirim("Dikirim");
        } elseif ($aksi == "pembelianDiterima") {
            $pembelian->updateStatusTransaksi(4);
        }
    } elseif ($page == "transaksi") {
        $transaksi = new TransaksiController();
        if ($aksi == "view") {
            $transaksi->view();
        } elseif ($aksi == "checkoutKeranjang") {
            $transaksi->checkoutKeranjang();
        } elseif ($aksi == "update") {
            $transaksi->update();
        }
    } elseif ($page == "daftar") {
        if ($aksi == "view") {
            require_once("View/daftar.php");
        } elseif ($aksi == "store") {
            require_once("View/index.php");
        }
    }
} else {
    header("location: index.php?page=utama&aksi=view");
}

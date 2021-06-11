<?php

require_once("Koneksi.php");

$BASE_URL = "http://localhost/projek-belanjaBajuOnline";

//memanggil model
require_once("Model/TransaksiModel.php");
require_once("Model/UserModel.php");
require_once("Model/KurirModel.php");

//memanggil controller
require_once("Controller/TransaksiController.php");


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
                if ($aksi == "view") {
                    require_once("View/admin/permintaan.php");
                } elseif ($aksi == "terimaPesanan") {
                    require_once("View/admin/permintaan.php");
                }
            } elseif ($page == "laporan") {
                if ($aksi == "view") {
                    require_once("View/admin/laporan/index.php");
                } elseif ($aksi == "detailLaporan") {
                    require_once("View/admin/laporan/laporan_tiap_user.php");
                } elseif ($aksi == "semuaTransaksi") {
                    require_once("View/admin/laporan/index.php");
                } elseif ($aksi == "transaksiByUser") {
                    require_once("View/admin/laporan/index.php");
                }
            }
        } else {
            require_once("View/admin/login.php");
        }
    } else {
        header("location: index.php?view=admin");
    }
} elseif (isset($_GET['page']) && isset($_GET['aksi'])) {
    $page = $_GET['page'];
    $aksi = $_GET['aksi'];

    if ($page == "utama") {
        if ($aksi == "view") {
            require_once("View/index.php");
        } elseif ($aksi == "prosesLogin") {
            require("View/index.php");
        } elseif ($aksi == "prosesLogout") {
            require("View/index.php");
        } elseif ($aksi == "tambahKeranjang") {
            if ($_SESSION['user'] == "aktif") {
                //isi proses model
            }
        } elseif ($aksi == "simpanBaju") {
            if ($_SESSION['user'] == "aktif") {
                //isi proses model
            }
        } elseif ($aksi == "filterPencarian") {
            require_once("View/index.php");
        } elseif ($aksi == "cariBaju") {
            require_once("View/index.php");
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
            $pembelian->updatePembelian();
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

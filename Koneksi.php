<?php

function koneksi() {
    $db_host = "localhost";
    $db_user = "root";
    // $db_user = "id19641618_root";
    $db_password = "";
    $db_database = "db_belanjabajuonline";
    // $db_database = "id19641618_db_belanjabajuonline";

    try {
        return new mysqli($db_host, $db_user, $db_password, $db_database);
    } catch (Exception $e) {
        echo "terjadi kesalahan koneksi database";
    }
}

<?php

class AuthModel
{

    /**
     * berfungsi untuk mengecek user dan password yang ada di database berdasarkan username dan password
     */
    public function cekUser($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * berfungsi untuk menyimpan data pendaftaran ke dalam database berdasarkan data dari form
     */
    public function prosesStore($nama, $tanggalLahir, $jenisKelamin, $alamat, $kota, $noTelp, $email, $username, $password)
    {
        $sqlInsertUsers = "INSERT INTO users(email, no_telp, username, password) VALUES('$email', '$noTelp', '$username', '$password')";
        koneksi()->query($sqlInsertUsers);
        $sqlCurrentIdUser = "SELECT MAX(id_user) as idUser FROM users";
        $query = koneksi()->query($sqlCurrentIdUser);
        $hasilQuery = $query->fetch_assoc();
        $idUser = $hasilQuery['idUser'];
        $sqlInsertOwnerUser = "INSERT INTO owner_user(id_user, id_kota, nama, jenis_kelamin, tanggal_lahir, alamat) VALUES($idUser, $kota, '$nama', '$jenisKelamin', '$tanggalLahir', '$alamat')";
        return koneksi()->query($sqlInsertOwnerUser);
    }
}

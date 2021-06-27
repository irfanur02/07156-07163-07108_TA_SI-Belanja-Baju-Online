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
}

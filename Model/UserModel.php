<?php

class UserModel
{

    /**
     * berfungsi untuk mendapatkan data user berdasarkan id user
     */
    public function getDataUser($idUser)
    {
        $sql = "SELECT * FROM users us
                JOIN owner_user ou ON us.id_user = ou.id_user
                JOIN kota ko ON ou.id_kota = ko.id_kota
                WHERE us.id_user = $idUser";
        $query = koneksi()->query($sql);
        $data = $query->fetch_assoc();
        return $data;
    }

    /**
     * berfungsi untuk mengupdate profil berdasarkan data yang ada di form
     */
    public function prosesUpdate($idUser, $idOwnerUser, $nama, $tanggalLahir, $jenisKelamin, $alamat, $kota, $noTelp, $email, $username, $password)
    {
        $sqlUpdateOwnerUser = "UPDATE owner_user SET
                                    nama = '$nama',
                                    tanggal_lahir = '$tanggalLahir',
                                    jenis_kelamin = '$jenisKelamin',
                                    alamat = '$alamat',
                                    id_kota = $kota
                                WHERE id_owner_user = $idOwnerUser";
        koneksi()->query($sqlUpdateOwnerUser);
        $sqlUpdateUser = "UPDATE users SET
                                email = $email,
                                no_telp = $noTelp,
                                username = $username,
                                password = $password
                            WHERE id_user = $idUser";
        koneksi()->query($sqlUpdateUser);
    }
}

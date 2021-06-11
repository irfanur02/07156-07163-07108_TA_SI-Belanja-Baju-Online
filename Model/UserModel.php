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
}

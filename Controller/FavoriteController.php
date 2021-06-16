<?php

class FavoriteController
{
    private $model;

    public function __construct()
    {
        $this->model = new FavoriteModel();
    }

    /**
     * berfungsi untuk meyimpan produk ke dalam favorite
     */
    public function store()
    {
        $idUser = $_POST['idUser'];
        $idBaju = $_POST['idBaju'];
        if (empty($this->model->cekFavoriteUser($idUser, $idBaju))) {
            $this->model->prosesStore($idUser, $idBaju);
        }
    }
}

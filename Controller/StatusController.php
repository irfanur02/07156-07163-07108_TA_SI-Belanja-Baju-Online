<?php

class StatusController
{

    private $modelStatus;
    private $modelTransaksi;

    public function __construct()
    {
        $this->modelStatus = new StatusModel();
        $this->modelTransaksi = new TransaksiModel();
    }

    public function view()
    {
        $dataJumlahPermintaan = $this->modelTransaksi->getJumlahPermintaan();
        $dataStatus = $this->modelStatus->getStatus();
        extract($dataJumlahPermintaan);
        extract($dataStatus);
        require_once("View/admin/status_pembelian/index.php");
    }
}

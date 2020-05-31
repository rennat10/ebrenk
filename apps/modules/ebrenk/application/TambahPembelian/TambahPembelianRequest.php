<?php

namespace Ebrenk\Application\TambahPembelian;

class TambahPembelianRequest
{
    protected $id_pelanggan;
    protected $tanggal_pembelian;
    protected $total_pembelian;

    public function __construct($id_pelanggan, $tanggal_pembelian, $total_pembelian)
    {
        $this->id_pelanggan = $id_pelanggan;
        $this->tanggal_pembelian = $tanggal_pembelian;
        $this->total_pembelian = $total_pembelian;
    }

    public function getId()
    {
        return $this->id_pelanggan;
    }

    public function getTanggal()
    {
        return $this->tanggal_pembelian;
    }

    public function getTotal()
    {
        return $this->total_pembelian;
    }
}
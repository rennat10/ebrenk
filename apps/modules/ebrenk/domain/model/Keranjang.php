<?php

namespace Ebrenk\Domain\Model;

class Keranjang
{
    protected $id_produk;
    protected $id_pelanggan;

    public function __construct($id_produk, $id_pelanggan)
    {
        $this->id_produk = $id_produk;
        $this->id_pelanggan = $id_pelanggan;
    }

    public function getIdProduk()
    {
        return $this->id_produk;
    }

    public function getIdPelanggan()
    {
        return $this->id_pelanggan;
    }
}
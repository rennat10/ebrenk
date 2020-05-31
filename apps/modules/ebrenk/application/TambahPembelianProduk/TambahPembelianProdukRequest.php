<?php

namespace Ebrenk\Application\TambahPembelianProduk;

class TambahPembelianProdukRequest
{
    protected $id_pembelian;
    protected $id_produk;
    protected $jumlah;

    public function __construct($id_pembelian, $id_produk, $jumlah)
    {
        $this->id_pembelian = $id_pembelian;
        $this->id_produk = $id_produk;
        $this->jumlah = $jumlah;
    }

    public function getIdPembelian()
    {
        return $this->id_pembelian;
    }

    public function getIdProduk()
    {
        return $this->id_produk;
    }

    public function getJumlah()
    {
        return $this->jumlah;
    }
}
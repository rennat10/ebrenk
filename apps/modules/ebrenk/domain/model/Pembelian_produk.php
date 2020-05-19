<?php

namespace Ebrenk\Domain\Model;

class Pembelian_produk
{
    protected $id_pembelian_produk;
    protected $id_pembelian;
    protected $id_produk;
    protected $jumlah;

    public function __construct($id_pembelian_produk, $id_pembelian, $id_produk, $jumlah)
    {
        $this->id_pembelian_produk = $id_pembelian_produk;
        $this->id_pembelian = $id_pembelian;
        $this->id_produk = $id_produk;
        $this->jumlah = $jumlah;
    }

    public function getIdPembelianProduk()
    {
        return $this->id_pembelian_produk;
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
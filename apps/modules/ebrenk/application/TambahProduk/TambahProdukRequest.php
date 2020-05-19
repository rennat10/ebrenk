<?php

namespace Ebrenk\Application\TambahProduk;

class TambahProdukRequest
{    
    protected $nama_produk;
    protected $harga_produk;
    protected $foto_produk;
    protected $deskripsi_produk;

    public function __construct($nama_produk, $harga_produk, $foto_produk, $deskripsi_produk)
    {
        $this->nama_produk = $nama_produk;
        $this->harga_produk = $harga_produk;
        $this->foto_produk = $foto_produk;
        $this->deskripsi_produk = $deskripsi_produk;
    }

    public function getNama()
    {
        return $this->nama_produk;
    }

    public function getHarga()
    {
        return $this->harga_produk;
    }

    public function getFoto()
    {
        return $this->foto_produk;
    }

    public function getDeskripsi()
    {
        return $this->deskripsi_produk;
    }
}
<?php

namespace Ebrenk\Domain\Model;

class Produk
{
    protected $id_produk;
    protected $nama_produk;
    protected $harga_produk;
    protected $foto_produk;
    protected $deskripsi_produk;
    protected $stok_produk;

    public function __construct($id_produk, $nama_produk, $harga_produk, $foto_produk, $deskripsi_produk, $stok_produk)
    {
        $this->id_produk = $id_produk;
        $this->nama_produk = $nama_produk;
        $this->harga_produk = $harga_produk;
        $this->foto_produk = $foto_produk;
        $this->deskripsi_produk = $deskripsi_produk;
        $this->stok_produk = $stok_produk;
    }

    public function getId()
    {
        return $this->id_produk;
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

    public function getStok()
    {
        return $this->stok_produk;
    }

    public function rupiah()
    {
        return number_format($this->harga_produk);
    }
}
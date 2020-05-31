<?php

namespace Ebrenk\Domain\Model;

class Keranjang
{
    protected $id_produk;
    protected $id_pelanggan;
    protected $nama;
    protected $jumlah;
    protected $stok;
    protected $harga;
    protected $total;

    public function __construct($id_produk, $id_pelanggan, $nama, $jumlah, $stok, $harga, $total)
    {
        $this->id_produk = $id_produk;
        $this->id_pelanggan = $id_pelanggan;
        $this->nama = $nama;
        $this->jumlah = $jumlah;
        $this->stok = $stok;
        $this->harga = $harga;
        $this->total = $total;
    }

    public function getIdProduk()
    {
        return $this->id_produk;
    }

    public function getIdPelanggan()
    {
        return $this->id_pelanggan;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getJumlah()
    {
        return $this->jumlah;
    }

    public function getStok()
    {
        return $this->stok;
    }

    public function getHarga()
    {
        return number_format($this->harga);
    }

    public function getTotal()
    {
        return number_format($this->total);
    }

    public function total()
    {
        return $this->total;
    }
}
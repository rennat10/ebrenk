<?php

namespace Ebrenk\Domain\Repository;

use Ebrenk\Domain\Model\Produk;

interface ProdukRepository
{
    public function view():array;
    public function hapus($id_produk);
    public function update($id_produk, $nama_produk, $harga_produk, $foto_produk, $deskripsi_produk);
    public function tambah($nama_produk, $harga_produk, $foto_produk, $deskripsi_produk);
    public function findById($id_produk):Produk;
}
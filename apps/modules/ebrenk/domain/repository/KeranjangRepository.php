<?php

namespace Ebrenk\Domain\Repository;
use Ebrenk\Domain\Model\Keranjang;

interface KeranjangRepository
{
    public function findByIdPelanggan($id_pelanggan):array;
    public function add($id_produk, $id_pelanggan, $jumlah);
    public function hapus($id_produk, $id_pelanggan);
    public function hapusKeranjang($id_pelanggan);
}
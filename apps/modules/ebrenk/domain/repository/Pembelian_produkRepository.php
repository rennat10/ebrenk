<?php

namespace Ebrenk\Domain\Repository;
use Ebrenk\Domain\Model\Pembelian_produk;

interface Pembelian_produkRepository
{
    public function detail($id_pembelian):array;
}
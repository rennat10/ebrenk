<?php

namespace Ebrenk\Domain\Repository;

use Ebrenk\Domain\Model\Pembelian;

interface PembelianRepository
{
    public function view():array;
    public function findById($id_pembelian):array;
    public function findByPelanggan($id_pelanggan):array;
    public function add($id_pelanggan, $tanggal_pembelian, $total_pembelian);
}
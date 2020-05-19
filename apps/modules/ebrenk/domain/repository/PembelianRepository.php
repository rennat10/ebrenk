<?php

namespace Ebrenk\Domain\Repository;

interface PembelianRepository
{
    public function view():array;
    public function findById($id_pembelian):array;
    public function findByPelanggan($id_pelanggan):array;
}
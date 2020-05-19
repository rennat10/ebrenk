<?php

namespace Ebrenk\Domain\Repository;

use Ebrenk\Domain\Model\Pelanggan;

interface PelangganRepository
{
    public function view():array;
    public function hapus($id_pelanggan);
}
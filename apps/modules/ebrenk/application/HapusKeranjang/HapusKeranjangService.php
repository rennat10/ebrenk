<?php

namespace Ebrenk\Application\HapusKeranjang;

use Ebrenk\Domain\Repository\KeranjangRepository;

class HapusKeranjangService
{
    protected $keranjangRepository;

    public function __construct(KeranjangRepository $keranjangRepository)
    {
        $this->keranjangRepository = $keranjangRepository;
    }

    public function execute($id_produk, $id_pelanggan)
    {
        $this->keranjangRepository->hapus($id_produk, $id_pelanggan);
    }
}
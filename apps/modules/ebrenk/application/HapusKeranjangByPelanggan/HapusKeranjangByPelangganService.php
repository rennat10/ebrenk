<?php

namespace Ebrenk\Application\HapusKeranjangByPelanggan;

use Ebrenk\Domain\Repository\KeranjangRepository;

class HapusKeranjangByPelangganService
{
    protected $keranjangRepository;

    public function __construct(KeranjangRepository $keranjangRepository)
    {
        $this->keranjangRepository = $keranjangRepository;
    }

    public function execute($id_pelanggan)
    {
        $this->keranjangRepository->hapusKeranjang($id_pelanggan);
    }
}
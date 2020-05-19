<?php

namespace Ebrenk\Application\TambahKeranjang;
use Ebrenk\Domain\Repository\KeranjangRepository;

class TambahKeranjangService
{
    protected $keranjangRepository;

    public function __construct(KeranjangRepository $keranjangRepository)
    {
        $this->keranjangRepository = $keranjangRepository;
    }

    public function execute($id_produk, $id_pelanggan)
    {
        $this->keranjangRepository->add($id_produk, $id_pelanggan);
    }
}
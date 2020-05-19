<?php

namespace Ebrenk\Application\CariProduk;
use Ebrenk\Domain\Repository\ProdukRepository;

class CariProdukService
{
    protected $produkRepository;

    public function __construct(ProdukRepository $produkRepository)
    {
        $this->produkRepository = $produkRepository;
    }

    public function execute($nama_produk)
    {
        return $this->produkRepository->findByName($nama_produk);
    }
}
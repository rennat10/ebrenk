<?php

namespace Ebrenk\Application\ViewAllProduk;

use Ebrenk\Domain\Repository\ProdukRepository;

class ViewAllProdukService
{
    protected $produkRepository;

    public function __construct(ProdukRepository $produkRepository)
    {
        $this->produkRepository = $produkRepository;
    }

    public function execute()
    {
        return $this->produkRepository->view();
    }
}
<?php

namespace Ebrenk\Application\ViewAllPembelian;
use Ebrenk\Domain\Repository\PembelianRepository;

class ViewAllPembelianService
{
    protected $pembelianRepository;

    public function __construct(PembelianRepository $pembelianRepository)
    {
        $this->pembelianRepository = $pembelianRepository;
    }

    public function execute()
    {
        return $this->pembelianRepository->view();
    }
}
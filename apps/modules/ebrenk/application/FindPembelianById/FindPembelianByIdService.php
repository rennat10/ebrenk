<?php

namespace Ebrenk\Application\FindPembelianById;

use Ebrenk\Domain\Repository\PembelianRepository;

class FindPembelianByIdService
{
    protected $pembelianRepository;

    public function __construct(PembelianRepository $pembelianRepository)
    {
        $this->pembelianRepository = $pembelianRepository;
    }

    public function execute($id_pembelian)
    {
        return $this->pembelianRepository->findById($id_pembelian);
    }
}
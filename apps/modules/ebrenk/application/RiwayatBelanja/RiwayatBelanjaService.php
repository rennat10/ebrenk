<?php

namespace Ebrenk\Application\RiwayatBelanja;
use Ebrenk\Domain\Repository\PembelianRepository;

class RiwayatBelanjaService
{
    protected $pembelianRepository;

    public function __construct(PembelianRepository $pembelianRepository)
    {
        $this->pembelianRepository = $pembelianRepository;
    }

    public function execute($id_pelanggan)
    {
        return $this->pembelianRepository->findByPelanggan($id_pelanggan);
    }
}
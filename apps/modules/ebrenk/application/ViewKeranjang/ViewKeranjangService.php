<?php

namespace Ebrenk\Application\ViewKeranjang;
use Ebrenk\Domain\Repository\KeranjangRepository;

class ViewKeranjangService
{
    protected $keranjangRepository;

    public function __construct(KeranjangRepository $keranjangRepository)
    {
        $this->keranjangRepository = $keranjangRepository;
    }

    public function execute($id_pelanggan)
    {
        return $this->keranjangRepository->findByIdPelanggan($id_pelanggan);
    }
}
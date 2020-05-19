<?php

namespace Ebrenk\Application\DataPelanggan;
use Ebrenk\Domain\Repository\PelangganRepository;

class DataPelangganService
{
    protected $pelangganRepository;

    public function __construct(PelangganRepository $pelangganRepository)
    {
        $this->pelangganRepository = $pelangganRepository;
    }

    public function execute($id_pelanggan)
    {
        return $this->pelangganRepository->findByPelanggan($id_pelanggan);
    }
}
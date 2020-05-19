<?php

namespace Ebrenk\Application\ViewAllPelanggan;

use Ebrenk\Domain\Repository\PelangganRepository;

class ViewAllPelangganService
{
    protected $pelangganRepository;

    public function __construct(PelangganRepository $pelangganRepository)
    {
        $this->pelangganRepository = $pelangganRepository;
    }

    public function execute()
    {
        return $this->pelangganRepository->view();
    }
}
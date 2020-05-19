<?php

namespace Ebrenk\Application\HapusPelanggan;

use Ebrenk\Domain\Repository\PelangganRepository;

class HapusPelangganService
{
    protected $pelangganRepository;

    public function __construct(PelangganRepository $pelangganRepository)
    {
        $this->pelangganRepository = $pelangganRepository;
    }

    public function execute($id_pelanggan)
    {
        try {
            $this->pelangganRepository->hapus($id_pelanggan);
            return new HapusPelangganResponse('Hapus pelanggan berhasil.');
        }
        catch(\Exception $e) {
            return new HapusPelangganResponse($e->getMessage(), TRUE);
        }
    }
}
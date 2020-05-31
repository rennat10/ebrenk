<?php

namespace Ebrenk\Application\TambahPembelian;

use Ebrenk\Domain\Repository\PembelianRepository;

class TambahPembelianService
{
    protected $pembelianRepository;

    public function __construct(PembelianRepository $pembelianRepository)
    {
        $this->pembelianRepository = $pembelianRepository;
    }

    public function execute(TambahPembelianRequest $request)
    {
        $id_pelanggan = $request->getId();
        $tanggal_pembelian = $request->getTanggal();
        $total_pembelian = $request->getTotal();

        $this->pembelianRepository->add($id_pelanggan, $tanggal_pembelian, $total_pembelian);
    }
}
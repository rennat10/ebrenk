<?php

namespace Ebrenk\Application\ViewDetail;

use Ebrenk\Domain\Repository\Pembelian_produkRepository;

class ViewDetailService
{
    protected $pembelian_produkRepository;

    public function __construct(Pembelian_produkRepository $pembelian_produkRepository)
    {
        $this->pembelian_produkRepository = $pembelian_produkRepository;
    }

    public function execute($id_pembelian)
    {
        return $this->pembelian_produkRepository->detail($id_pembelian);
    }
}
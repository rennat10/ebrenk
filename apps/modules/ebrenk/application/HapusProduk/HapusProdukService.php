<?php

namespace Ebrenk\Application\HapusProduk;

use Ebrenk\Domain\Repository\ProdukRepository;

class HapusProdukService
{
    protected $produkRepository;

    public function __construct(ProdukRepository $produkRepository)
    {
        $this->produkRepository = $produkRepository;
    }

    public function execute($id_produk)
    {
        try {
            $this->produkRepository->hapus($id_produk);
            return new HapusProdukResponse('Hapus produk berhasil.');
        }
        catch(\Exception $e) {
            return new HapusProdukResponse($e->getMessage(), TRUE);
        }
    }
}
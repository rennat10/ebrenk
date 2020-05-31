<?php

namespace Ebrenk\Application\TambahPembelianProduk;

use Ebrenk\Domain\Repository\Pembelian_produkRepository;

class TambahPembelianProdukService
{
    protected $pembelianProdukRepository;

    public function __construct(Pembelian_produkRepository $pembelianProdukRepository)
    {
        $this->pembelianProdukRepository = $pembelianProdukRepository;
    }

    public function execute(TambahPembelianProdukRequest $request)
    {
        $id_pembelian = $request->getIdPembelian();
        $id_produk = $request->getIdProduk();
        $jumlah = $request->getJumlah();

        $this->pembelianProdukRepository->add($id_pembelian, $id_produk, $jumlah);
    }
}
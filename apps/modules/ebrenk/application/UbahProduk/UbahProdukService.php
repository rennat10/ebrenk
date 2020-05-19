<?php

namespace Ebrenk\Application\UbahProduk;

use Ebrenk\Domain\Repository\ProdukRepository;

class UbahProdukService
{
    protected $produkRepository;

    public function __construct(ProdukRepository $produkRepository)
    {
        $this->produkRepository = $produkRepository;
    }

    public function execute(UbahProdukRequest $request)
    {
        $id_produk = $request->getId();
        $nama_produk = $request->getNama();
        $harga_produk = $request->getHarga();
        $foto_produk = $request->getFoto();
        $deskripsi_produk = $request->getDeskripsi();

        try {
            $this->produkRepository->update($id_produk, $nama_produk, $harga_produk, $foto_produk, $deskripsi_produk);
            return new UbahProdukResponse('Ubah produk berhasil.');
        }
        catch (\Exception $e) {
            return new UbahProdukResponse($e->getMessage(), TRUE);
        }
    }
}
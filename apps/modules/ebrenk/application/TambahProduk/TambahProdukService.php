<?php

namespace Ebrenk\Application\TambahProduk;

use Ebrenk\Domain\Repository\ProdukRepository;

class TambahProdukService
{
    protected $produkRepository;

    public function __construct(ProdukRepository $produkRepository)
    {
        $this->produkRepository = $produkRepository;
    }

    public function execute(TambahProdukRequest $request)
    {
        $nama_produk = $request->getNama();
        $harga_produk = $request->getHarga();
        $foto_produk = $request->getFoto();
        $deskripsi_produk = $request->getDeskripsi();

        try {
            $this->produkRepository->tambah($nama_produk, $harga_produk, $foto_produk, $deskripsi_produk);
            return new TambahProdukResponse('Tambah produk berhasil.');
        }
        catch (\Exception $e) {
            return new TambahProdukResponse($e->getMessage(), TRUE);
        }
    }
}
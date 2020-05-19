<?php

namespace Ebrenk\Application\FindProdukById;

use Ebrenk\Domain\Repository\ProdukRepository;

class FindProdukByIdService
{
    protected $produkRepository;

    public function __construct(ProdukRepository $produkRepository)
    {
        $this->produkRepository = $produkRepository;
    }

    public function execute(FindProdukByIdRequest $request)
    {
        $id_produk = $request->getId();

        try {
            $data = $this->produkRepository->findById($id_produk);
            return new FindProdukByIdResponse('Produk ditemukan.', $data);
        }
        catch(\Exception $e) {
            return new FindProdukByIdResponse($e->getMessage(), NULL, TRUE);
        }
    }
}
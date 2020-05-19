<?php

namespace Ebrenk\Application\FindProdukById;

class FindProdukByIdRequest
{
    protected $id_produk;

    public function __construct($id_produk)
    {
        $this->id_produk = $id_produk;
    }

    public function getId()
    {
        return $this->id_produk;
    }
}
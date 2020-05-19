<?php

namespace Ebrenk\Infrastructure\Persistence;
use Ebrenk\Domain\Repository\Pembelian_produkRepository;
use Ebrenk\Domain\Model\Pembelian_produk;
use Ebrenk\Domain\Model\Produk;
class SqlPembelian_produkRepository implements Pembelian_produkRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function detail($id_pembelian):array
    {
        $sql = "SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian= :id_pembelian";

        $result = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [
            'id_pembelian' => $id_pembelian
        ]);

        $resultArray = array();
        foreach($result as $row)
        {
            array_push($resultArray, $row);
        }

        return $resultArray;
    }
}
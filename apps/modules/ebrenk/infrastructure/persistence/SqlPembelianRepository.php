<?php

namespace Ebrenk\Infrastructure\Persistence;
use Ebrenk\Domain\Repository\PembelianRepository;
use Ebrenk\Domain\Model\Pembelian;
use Ebrenk\Domain\Model\Pelanggan;

class SqlPembelianRepository implements PembelianRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function view():array
    {
        $sql = "SELECT * FROM Pembelian JOIN Pelanggan ON Pembelian.id_pelanggan=Pelanggan.id_pelanggan";

        $result = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);
        $resultArray = array();

        foreach($result as $row)
        {
            array_push($resultArray, $row);
        }

        return $resultArray;
    }
}
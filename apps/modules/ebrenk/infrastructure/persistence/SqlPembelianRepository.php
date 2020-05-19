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

    public function findById($id_pembelian):array
    {
        $sql = "SELECT * FROM pembelian JOIN pelanggan
                ON pembelian.id_pelanggan=pelanggan.id_pelanggan
                WHERE pembelian.id_pembelian=:id_pembelian";

        $result = $this->db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'id_pembelian' => $id_pembelian
        ]);
        $resultArray = array();
        array_push($resultArray, $result);
        return $result;
    }

    public function findByPelanggan($id_pelanggan):array
    {
        $sql = "SELECT * FROM Pembelian WHERE id_pelanggan = :id_pelanggan";

        $result = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC,[
            'id_pelanggan' => $id_pelanggan
        ]);

        $resultArray = array();
        foreach($result as $row)
        {
            $pembelian = new Pembelian($row['id_pembelian'], $row['id_pelanggan'], $row['id_ongkir'], $row['tanggal_pembelian'], $row['total_pembelian'], $row['status_pembelian'], $row['resi_pengiriman']);

            array_push($resultArray, $pembelian);
        }
        

        return $resultArray;
    }
}
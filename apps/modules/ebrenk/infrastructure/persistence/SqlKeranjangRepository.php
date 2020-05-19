<?php

namespace Ebrenk\Infrastructure\Persistence;
use Ebrenk\Domain\Model\Keranjang;
use Ebrenk\Domain\Repository\KeranjangRepository;
use Ebrenk\Domain\Model\Produk;

class SqlKeranjangRepository implements KeranjangRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findByIdPelanggan($id_pelanggan):array
    {
        $sql = "SELECT * FROM Keranjang 
                INNER JOIN Produk
                ON Produk.id_produk = Keranjang.id_produk
                WHERE id_pelanggan = :id_pelanggan";

        $result = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [
            'id_pelanggan' => $id_pelanggan
        ]);
        $resultArray = array();

        foreach($result as $row)
        {
            array_push($resultArray, $row);
        }

        return $resultArray;
    }

    public function add($id_produk, $id_pelanggan)
    {
        $sql = "INSERT INTO Keranjang(id_produk, id_pelanggan) VALUES (:id_produk, :id_pelanggan)";

        $this->db->query($sql, [
            'id_produk' => $id_produk,
            'id_pelanggan' => $id_pelanggan
        ]);
    }

    public function hapus($id_produk, $id_pelanggan)
    {
        $sql = "DELETE FROM Keranjang WHERE id_produk = :id_produk and id_pelanggan = :id_pelanggan";
        
        $this->db->query($sql, [
            'id_produk' => $id_produk,
            'id_pelanggan' => $id_pelanggan
        ]);
    }
}
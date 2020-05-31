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
            $keranjang = new Keranjang($row['id_produk'], $id_pelanggan, $row['nama_produk'], $row['jumlah'], $row['stok_produk'], $row['harga_produk'], $row['harga_produk'] * $row['jumlah']);
            array_push($resultArray, $keranjang);
        }

        return $resultArray;
    }

    public function add($id_produk, $id_pelanggan, $jumlah)
    {
        $firstSql = "SELECT * FROM Keranjang WHERE id_produk = :id_produk and id_pelanggan = :id_pelanggan";
        $result = $this->db->fetchOne($firstSql, \Phalcon\Db::FETCH_ASSOC, [
            'id_produk' => $id_produk,
            'id_pelanggan' => $id_pelanggan
        ]);

        if($result)
        {
            $sql = "UPDATE Keranjang
                    SET jumlah = :jumlah
                    WHERE id_produk = :id_produk and id_pelanggan = :id_pelanggan";
            
            $sqlProduk = "SELECT * FROM Produk WHERE id_produk = :id_produk";
            $resultProduk = $this->db->fetchOne($sqlProduk, \Phalcon\Db::FETCH_ASSOC, [
                'id_produk' => $id_produk
            ]);
            
            $jumlahBeli = $result['jumlah'] + $jumlah;
            if($jumlahBeli > $resultProduk['stok_produk'])
            {
                $jumlahBeli = $resultProduk['stok_produk'];
            }
            
            $this->db->query($sql, [
                'jumlah' => $jumlahBeli,
                'id_produk' => $id_produk,
                'id_pelanggan' => $id_pelanggan
            ]);
        }
        else 
        {
            $sql = "INSERT INTO Keranjang(id_produk, id_pelanggan, jumlah) VALUES (:id_produk, :id_pelanggan, :jumlah)";

            $this->db->query($sql, [
                'id_produk' => $id_produk,
                'id_pelanggan' => $id_pelanggan,
                'jumlah' => $jumlah
            ]);
        }        
    }

    public function hapus($id_produk, $id_pelanggan)
    {
        $sql = "DELETE FROM Keranjang WHERE id_produk = :id_produk and id_pelanggan = :id_pelanggan";
        
        $this->db->query($sql, [
            'id_produk' => $id_produk,
            'id_pelanggan' => $id_pelanggan
        ]);
    }

    public function hapusKeranjang($id_pelanggan)
    {
        $sql = "DELETE FROM Keranjang WHERE id_pelanggan = :id_pelanggan";

        $this->db->query($sql, [
            'id_pelanggan' => $id_pelanggan
        ]);
    }
}
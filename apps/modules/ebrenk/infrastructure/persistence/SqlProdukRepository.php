<?php

namespace Ebrenk\Infrastructure\Persistence;

use Ebrenk\Domain\Repository\ProdukRepository;
use Ebrenk\Domain\Model\Produk;

class SqlProdukRepository implements ProdukRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function view():array
    {
        $sql = "SELECT * FROM Produk";

        $result = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);

        $resultArray = array();
        foreach($result as $row)
        {
            $produk = new Produk(
                $row['id_produk'],
                $row['nama_produk'],
                $row['harga_produk'],
                $row['foto_produk'],
                $row['deskripsi_produk'],
                $row['stok_produk']
            );

            array_push($resultArray, $produk);
        }

        return $resultArray;
    }

    public function hapus($id_produk)
    {
        $sql = "DELETE FROM Produk WHERE id_produk = :id_produk";

        $this->db->query($sql, [
            'id_produk' => $id_produk
        ]);
    }

    public function update($id_produk, $nama_produk, $harga_produk, $foto_produk, $deskripsi_produk)
    {
        $sql = "UPDATE Produk 
                SET nama_produk = :nama_produk, harga_produk = :harga_produk, foto_produk = :foto_produk, deskripsi_produk = :deskripsi_produk
                WHERE id_produk = :id_produk";

        $this->db->query($sql, [
            'id_produk' => $id_produk,
            'nama_produk' => $nama_produk,
            'harga_produk' => $harga_produk,
            'foto_produk' => $foto_produk,
            'deskripsi_produk' => $deskripsi_produk
        ]);
    }

    public function tambah($nama_produk, $harga_produk, $foto_produk, $deskripsi_produk)
    {
        $sql = "INSERT INTO Produk(nama_produk, harga_produk, foto_produk, deskripsi_produk) VALUES(:nama_produk, :harga_produk, :foto_produk, :deskripsi_produk)";

        $this->db->query($sql, [
            'nama_produk' => $nama_produk,
            'harga_produk' => $harga_produk,
            'foto_produk' => $foto_produk,
            'deskripsi_produk' => $deskripsi_produk
        ]);
    }

    public function findById($id_produk):Produk
    {
        $sql = "SELECT * FROM Produk WHERE id_produk = :id_produk";

        $result = $this->db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'id_produk' => $id_produk
        ]);

        $produk = new Produk(
            $result['id_produk'],
            $result['nama_produk'],
            $result['harga_produk'],
            $result['foto_produk'],
            $result['deskripsi_produk'],
            $result['stok_produk']
        );

        return $produk;
    }
}
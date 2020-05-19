<?php

namespace Ebrenk\Infrastructure\Persistence;
use Ebrenk\Domain\Repository\PelangganRepository;
use Ebrenk\Domain\Model\Pelanggan;

class SqlPelangganRepository implements PelangganRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function view():array
    {
        $sql = "SELECT * FROM Pelanggan";

        $result = $this->db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);
        $resultArray = array();

        foreach($result as $row)
        {
            $pelanggan = new Pelanggan(
                $row['id_pelanggan'],
                $row['email_pelanggan'],
                $row['password_pelanggan'],
                $row['nama_pelanggan']
            );

            array_push($resultArray, $pelanggan);
        }

        return $resultArray;     
    }

    public function hapus($id_pelanggan)
    {
        $sql = "DELETE FROM Pelanggan WHERE id_pelanggan = :id_pelanggan";

        $this->db->query($sql, [
            'id_pelanggan' => $id_pelanggan
        ]);
    }
}
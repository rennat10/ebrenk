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

    public function daftar($email_pelanggan, $password_pelanggan, $nama_pelanggan)
    {
        $sql = "INSERT INTO Pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan) VALUES(:email_pelanggan, :password_pelanggan, :nama_pelanggan)";

        $this->db->query($sql, [
            'email_pelanggan' => $email_pelanggan,
            'password_pelanggan' => $password_pelanggan,
            'nama_pelanggan' => $nama_pelanggan
        ]);
    }

    public function findByEmailPassword($email_pelanggan, $password_pelanggan):Pelanggan
    {
        $sql = "SELECT * FROM Pelanggan WHERE email_pelanggan = :email_pelanggan and password_pelanggan = :password_pelanggan";

        $result = $this->db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'email_pelanggan' => $email_pelanggan,
            'password_pelanggan' => $password_pelanggan
        ]);

        $pelanggan = new Pelanggan($result['id_pelanggan'], $result['email_pelanggan'], $result['password_pelanggan'], $result['nama_pelanggan']);

        return $pelanggan;
    }

    public function findByPelanggan($id_pelanggan):Pelanggan
    {
        $sql = "SELECT * FROM Pelanggan WHERE id_pelanggan = :id_pelanggan";

        $result = $this->db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'id_pelanggan' => $id_pelanggan
        ]);

        $pelanggan = new Pelanggan($result['id_pelanggan'], $result['email_pelanggan'], $result['password_pelanggan'], $result['nama_pelanggan']);

        return $pelanggan;
    }
}
<?php

namespace Ebrenk\Infrastructure\Persistence;
use Ebrenk\Domain\Repository\AdminRepository;
use Ebrenk\Domain\Model\Admin;

class SqlAdminRepository implements AdminRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findByUsernamePassword($username, $password):Admin
    {
        $sql = "SELECT * FROM Admin WHERE username = :username and password = :password";

        $result = $this->db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'username' => $username,
            'password' => $password
        ]);

        $admin = new Admin(
            $result['id_admin'],
            $result['username'],
            $result['password'],
            $result['nama_lengkap']
        );

        return $admin;
    }

    public function register($nama_lengkap, $username, $password)
    {
        $sql = "INSERT INTO Admin(nama_lengkap, username, password) VALUES(:nama_lengkap, :username, :password)";

        $this->db->query($sql, [
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'password' => $password
        ]);
    }
}
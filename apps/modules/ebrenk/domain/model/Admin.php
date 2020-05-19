<?php

namespace Ebrenk\Domain\Model;

class Admin
{
    protected $id_admin;
    protected $username;
    protected $password;
    protected $nama_lengkap;

    public function __construct($id_admin, $username, $password, $nama_lengkap)
    {
        $this->id_admin = $id_admin;
        $this->username = $username;
        $this->password = $password;
        $this->nama_lengkap = $nama_lengkap;
    }

    public function getId()
    {
        return $this->id_admin;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getNama()
    {
        return $this->nama_lengkap;
    }

    public function isExist()
    {
        return isset($this->id_admin);
    }
}
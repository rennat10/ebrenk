<?php

namespace Ebrenk\Application\RegisterAdmin;

class RegisterAdminRequest
{
    protected $username;
    protected $password;
    protected $nama_lengkap;

    public function __construct($username, $password, $nama_lengkap)
    {
        $this->username = $username;
        $this->password = $password;
        $this->nama_lengkap = $nama_lengkap;
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
}
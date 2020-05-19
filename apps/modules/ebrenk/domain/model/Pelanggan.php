<?php

namespace Ebrenk\Domain\Model;

class Pelanggan
{
    protected $id_pelanggan;
    protected $email_pelanggan;
    protected $password_pelanggan;
    protected $nama_pelanggan;

    public function __construct($id_pelanggan, $email_pelanggan, $password_pelanggan, $nama_pelanggan)
    {
        $this->id_pelanggan = $id_pelanggan;
        $this->nama_pelanggan = $nama_pelanggan;
        $this->email_pelanggan = $email_pelanggan;
        $this->password_pelanggan = $password_pelanggan;
    }

    public function getId()
    {
        return $this->id_pelanggan;
    }

    public function getNama()
    {
        return $this->nama_pelanggan;
    }

    public function getEmail()
    {
        return $this->email_pelanggan;
    }

    public function getPassword()
    {
        return $this->password_pelanggan;
    }

    public function isExist()
    {
        return isset($this->id_pelanggan);
    }
}
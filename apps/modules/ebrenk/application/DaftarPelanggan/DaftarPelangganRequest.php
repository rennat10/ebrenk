<?php

namespace Ebrenk\Application\DaftarPelanggan;

class DaftarPelangganRequest
{
    protected $email_pelanggan;
    protected $password_pelanggan;
    protected $nama_pelanggan;

    public function __construct($email_pelanggan, $password_pelanggan, $nama_pelanggan)
    {
        $this->email_pelanggan = $email_pelanggan;
        $this->password_pelanggan = $password_pelanggan;
        $this->nama_pelanggan = $nama_pelanggan;
    }

    public function getEmail()
    {
        return $this->email_pelanggan;
    }

    public function getPassword()
    {
        return $this->password_pelanggan;
    }

    public function getNama()
    {
        return $this->nama_pelanggan;
    }
}
<?php

namespace Ebrenk\Application\LoginPelanggan;

class LoginPelangganRequest
{
    protected $email_pelanggan;
    protected $password_pelanggan;

    public function __construct($email_pelanggan, $password_pelanggan)
    {
        $this->email_pelanggan = $email_pelanggan;
        $this->password_pelanggan = $password_pelanggan;
    }

    public function getEmail()
    {
        return $this->email_pelanggan;
    }

    public function getPassword()
    {
        return $this->password_pelanggan;
    }
}
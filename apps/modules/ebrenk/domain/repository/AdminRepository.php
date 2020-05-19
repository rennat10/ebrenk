<?php

namespace Ebrenk\Domain\Repository;
use Ebrenk\Domain\Model\Admin;

interface AdminRepository
{
    public function findByUsernamePassword($username, $password):Admin;
    public function register($nama_lengkap, $username, $password);
}
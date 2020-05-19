<?php

namespace Ebrenk\Domain\Repository;

use Ebrenk\Domain\Model\Pelanggan;

interface PelangganRepository
{
    public function view():array;
    public function hapus($id_pelanggan);
    public function daftar($email_pelanggan, $password_pelanggan, $nama_pelanggan);
    public function findByEmailPassword($email_pelanggan, $password_pelanggan):Pelanggan;
    public function findByPelanggan($id_pelanggan):Pelanggan;
}
<?php

namespace Ebrenk\Application\DaftarPelanggan;
use Ebrenk\Domain\Repository\PelangganRepository;

class DaftarPelangganService
{
    protected $pelangganRepository;

    public function __construct(PelangganRepository $pelangganRepository)
    {
        $this->pelangganRepository = $pelangganRepository;
    }

    public function execute(DaftarPelangganRequest $request)
    {
        $email_pelanggan = $request->getEmail();
        $password_pelanggan = $request->getPassword();
        $nama_pelanggan = $request->getNama();

        try {
            $this->pelangganRepository->daftar($email_pelanggan, $password_pelanggan, $nama_pelanggan);
            return new DaftarPelangganResponse('Daftar pelanggan berhasil.');
        }
        catch(\Exception $e) {
            return new DaftarPelangganResponse($e->getMessage(), TRUE);
        }
    }
}
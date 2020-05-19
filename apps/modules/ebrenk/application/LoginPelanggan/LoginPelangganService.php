<?php

namespace Ebrenk\Application\LoginPelanggan;
use Ebrenk\Domain\Repository\PelangganRepository;

class LoginPelangganService
{
    protected $pelangganRepository;

    public function __construct(PelangganRepository $pelangganRepository)
    {
        $this->pelangganRepository = $pelangganRepository;
    }

    public function execute(LoginPelangganRequest $request)
    {
        $email_pelanggan = $request->getEmail();
        $password_pelanggan = $request->getPassword();

        try {
            $pelanggan = $this->pelangganRepository->findByEmailPassword($email_pelanggan, $password_pelanggan);
            if($pelanggan->isExist())
            {
                return new LoginPelangganResponse('Login berhasil.', $pelanggan);
            }
            return new LoginPelangganResponse('Data tidak ditemukan.', NULL, TRUE);
        }
        catch(\Exception $e) {
            return new LoginPelangganResponse($e->getMessage(), NULL, TRUE);
        }
    }
}
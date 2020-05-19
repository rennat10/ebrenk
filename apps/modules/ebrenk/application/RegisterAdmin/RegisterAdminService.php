<?php

namespace Ebrenk\Application\RegisterAdmin;
use Ebrenk\Domain\Repository\AdminRepository;

class RegisterAdminService
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function execute(RegisterAdminRequest $request)
    {
        $username = $request->getUsername();
        $password = $request->getPassword();
        $nama_lengkap = $request->getNama();

        try {
            $this->adminRepository->register($nama_lengkap, $username, $password);
            return new RegisterAdminResponse('Register berhasil.');
        }
        catch(\Exception $e) {
            return new RegisterAdminResponse($e->getMessage(), TRUE);
        }
    }
}
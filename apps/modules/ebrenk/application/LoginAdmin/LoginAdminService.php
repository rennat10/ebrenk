<?php

namespace Ebrenk\Application\LoginAdmin;
use Ebrenk\Domain\Repository\AdminRepository;

class LoginAdminService
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function execute(LoginAdminRequest $request)
    {
        $username = $request->getUsername();
        $password = $request->getPassword();

        try {
            $admin = $this->adminRepository->findByUsernamePassword($username, $password);
            if($admin->isExist())
            {
                return new LoginAdminResponse('Login berhasil.', $admin);
            }
            return new LoginAdminResponse('Username tidak ditemukan.', NULL, TRUEE);
        }
        catch(\Exception $e) {
            return new LoginAdminResponse($e->getMessage(), NULL, TRUE);
        }
    }
}
<?php

namespace Ebrenk\Presentation\Controllers\Web;

use Phalcon\Mvc\Controller;
use Ebrenk\Application\LoginPelanggan\LoginPelangganRequest;
use Ebrenk\Application\DaftarPelanggan\DaftarPelangganRequest;

class UserController extends Controller
{
    protected $viewAllProdukService;
    protected $loginPelangganService;
    protected $daftarPelangganService;
    protected $dataPelangganService;
    protected $riwayatBelanjaService;
    protected $cariProdukService;
    protected $tambahKeranjangService;
    protected $viewKeranjangService;

    public function initialize()
    {
        $this->viewAllProdukService = $this->getDI()->get('viewAllProdukService');
        $this->loginPelangganService = $this->getDI()->get('loginPelangganService');
        $this->daftarPelangganService = $this->getDI()->get('daftarPelangganService');
        $this->dataPelangganService = $this->getDI()->get('dataPelangganService');
        $this->riwayatBelanjaService = $this->getDI()->get('riwayatBelanjaService');
        $this->cariProdukService = $this->getDI()->get('cariProdukService');
        $this->tambahKeranjangService = $this->getDI()->get('tambahKeranjangService');
        $this->viewKeranjangService = $this->getDI()->get('viewKeranjangService');
    }
    public function indexAction()
    {
        if($this->session->has('pelanggan')) return $this->response->redirect('ebrenk/user/home');
        $produkList = $this->viewAllProdukService->execute();
        $this->view->setVar('produkList', $produkList);
    }

    public function loginAction()
    {
        if($this->session->has('pelanggan')) return $this->response->redirect('ebrenk/user/home');
        if($this->request->isPost())
        {
            $email_pelanggan = $this->request->getPost('email');
            $password_pelanggan = md5($this->request->getPost('password'));

            $response = $this->loginPelangganService->execute(new LoginPelangganRequest($email_pelanggan, $password_pelanggan));
            if($response->getError())
            {
                echo $response->getMessage();
            }
            else
            {
                $this->session->set('pelanggan', [
                    'id_pelanggan' => $response->getData()->getId()
                ]);

                return $this->response->redirect('ebrenk/user/home');
            }
        }
    }

    public function homeAction()
    {
        if(!$this->session->has('pelanggan')) return $this->response->redirect('ebrenk/user');
        $produkList = $this->viewAllProdukService->execute();
        $this->view->setVar('produkList', $produkList);
    }

    public function riwayatAction()
    {
        if(!$this->session->has('pelanggan')) return $this->response->redirect('ebrenk/user');
        $id_pelanggan = $this->session->get('pelanggan')['id_pelanggan'];
        $pelanggan = $this->dataPelangganService->execute($id_pelanggan);
        $riwayatBelanja = $this->riwayatBelanjaService->execute($id_pelanggan);
        $this->view->setVar('pelanggan', $pelanggan);
        $this->view->setVar('riwayatBelanja', $riwayatBelanja);
    }

    public function logoutAction()
    {
        $this->session->remove('pelanggan');
        return $this->response->redirect('ebrenk/user/login');
    }

    public function daftarAction()
    {
        if($this->session->has('pelanggan')) return $this->response->redirect('ebrenk/user/home');
        if($this->request->isPost())
        {
            $email_pelanggan = $this->request->getPost('email');
            $password_pelanggan = md5($this->request->getPost('password'));
            $nama_pelanggan = $this->request->getPost('nama');

            $response = $this->daftarPelangganService->execute(new DaftarPelangganRequest($email_pelanggan, $password_pelanggan, $nama_pelanggan));
            if($response->getError())
            {
                echo $response->getMessage();
            }
            else
            {
                return $this->response->redirect('ebrenk/user/login');
            }
        }
    }

    public function checkoutAction()
    {
        $id_pelanggan = $this->session->get('pelanggan')['id_pelanggan'];
        $keranjangList = $this->viewKeranjangService->execute($id_pelanggan);
        $this->view->setVar('keranjangList', $keranjangList);
    }

    public function reviewAction($id_produk)
    {
        if($this->request->isPost())
        {
            
        }
    }

    public function cariAction()
    {
        if($this->request->isPost())
        {
            $substring = $this->request->getPost('substring');
            $nama_produk = '%' . $substring . "%";
            $produkList = $this->cariProdukService->execute($nama_produk);
            $this->view->setVar('produkList', $produkList);
        }
    }

    public function beliAction()
    {
        if($this->request->isPost())
        {
            $id_produk = $this->request->getPost('id_produk');
            $id_pelanggan = $this->session->get('pelanggan')['id_pelanggan'];
            $this->tambahKeranjangService->execute($id_produk, $id_pelanggan);
            return $this->response->redirect('ebrenk/user/checkout');
        }
    }
}
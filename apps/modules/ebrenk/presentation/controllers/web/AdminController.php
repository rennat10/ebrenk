<?php

namespace Ebrenk\Presentation\Controllers\Web;

use Phalcon\Mvc\Controller;

use Ebrenk\Application\TambahProduk\TambahProdukRequest;
use Ebrenk\Application\UbahProduk\UbahProdukRequest;
use Ebrenk\Application\FindProdukById\FindProdukByIdRequest;
use Ebrenk\Application\LoginAdmin\LoginAdminRequest;
use Ebrenk\Application\RegisterAdmin\RegisterAdminRequest;

class AdminController extends Controller
{
    protected $viewAllProdukService;
    protected $hapusProdukService;
    protected $tambahProdukService;
    protected $ubahProdukService;
    protected $findProdukByIdService;
    protected $viewAllPelangganService;
    protected $hapusPelangganService;
    protected $viewAllPembelianService;
    protected $viewDetailService;
    protected $findPembelianByIdService;
    protected $loginAdminService;
    protected $registerAdminService;

    public function initialize()
    {
        $this->viewAllProdukService = $this->getDI()->get('viewAllProdukService');
        $this->hapusProdukService = $this->getDI()->get('hapusProdukService');
        $this->tambahProdukService = $this->getDI()->get('tambahProdukService');
        $this->ubahProdukService = $this->getDI()->get('ubahProdukService');
        $this->findProdukByIdService = $this->getDI()->get('findProdukByIdService');
        $this->viewAllPelangganService = $this->getDI()->get('viewAllPelangganService');
        $this->hapusPelangganService = $this->getDI()->get('hapusPelangganService');
        $this->viewAllPembelianService = $this->getDI()->get('viewAllPembelianService');
        $this->viewDetailService = $this->getDI()->get('viewDetailService');
        $this->findPembelianByIdService = $this->getDI()->get('findPembelianByIdService');
        $this->loginAdminService = $this->getDI()->get('loginAdminService');
        $this->registerAdminService = $this->getDI()->get('registerAdminService');
    }

    public function homeAction()
    {
        if(!$this->session->has('admin')) return $this->response->redirect('ebrenk/admin');
    }

    public function indexAction()
    {
        if($this->session->has('admin')) return $this->response->redirect('ebrenk/admin/home');
        if($this->request->isPost())
        {
            $username = $this->request->getPost('username');
            $password = md5($this->request->getPost('password'));

            $response = $this->loginAdminService->execute(new LoginAdminRequest($username, $password));
            if($response->getError())
            {
                echo $response->getMessage();
            }
            else
            {
                $this->session->set('admin', [
                    'username' => $username
                ]);
                return $this->response->redirect('ebrenk/admin/home');
            }
        }
    }

    public function daftarAction()
    {
        if($this->session->has('admin')) return $this->response->redirect('ebrenk/admin/home');
        if($this->request->isPost())
        {
            $nama_lengkap = $this->request->getPost('nama_lengkap');
            $username = $this->request->getPost('username');
            $password = md5($this->request->getPost('password'));
            $confirm_password = md5($this->request->getPost('confirm_password'));

            if($password == $confirm_password)
            {
                $response = $this->registerAdminService->execute(new RegisterAdminRequest($username, $password, $nama_lengkap));
                if($response->getError())
                {
                    echo $response->getMessage();
                }
                else
                {
                    return $this->response->redirect('ebrenk/admin');
                }
            }
            else
            {
                return $this->response->redirect('ebrenk/admin/daftar');
            }
        }
    }

    public function keluarAction()
    {
        $this->session->remove('admin');
        return $this->response->redirect('ebrenk/admin');
    }

    public function detailAction($id_pembelian)
    {
        if(!$this->session->has('admin')) return $this->response->redirect('ebrenk/admin');
        $pembelian_produkList = $this->viewDetailService->execute($id_pembelian);
        $data = $this->findPembelianByIdService->execute($id_pembelian);
        $this->view->setVar('pembelian_produkList', $pembelian_produkList);
        $this->view->setVar('data', $data);
    }

    public function pembelianAction()
    {
        if(!$this->session->has('admin')) return $this->response->redirect('ebrenk/admin');
        $pembelianList = $this->viewAllPembelianService->execute();
        $this->view->setVar('pembelianList', $pembelianList);
    }

    public function produkAction()
    {
        if(!$this->session->has('admin')) return $this->response->redirect('ebrenk/admin');
        $produkList = $this->viewAllProdukService->execute();
        $this->view->setVar('produkList', $produkList);
    }

    public function pelangganAction()
    {
        if(!$this->session->has('admin')) return $this->response->redirect('ebrenk/admin');
        if($this->request->isPost(''))
        {
            $id_pelanggan = $this->request->getPost('id_pelanggan');
            $response = $this->hapusPelangganService->execute($id_pelanggan);

            if($response->getError())
            {
                $this->view->setVar('error', $response);
            }
            else
            {
                return $this->response->redirect('ebrenk/admin/pelanggan');
            }
        }

        $pelangganList = $this->viewAllPelangganService->execute();
        $this->view->setVar('pelangganList', $pelangganList);
    }

    public function hapusAction()
    {
        if(!$this->session->has('admin')) return $this->response->redirect('ebrenk/admin');
        $id_produk = $this->request->getPost('id');

        $response = $this->hapusProdukService->execute($id_produk);
        if($response->getError())
        {
            echo $response->getMessage();
        }
        else
        {
            return $this->response->redirect('ebrenk/admin/produk');
        }
    }

    public function ubahAction()
    {
        if(!$this->session->has('admin')) return $this->response->redirect('ebrenk/admin');
        if($this->request->isPost())
        {
            $id_produk = $this->request->getPost('id');
            $response = $this->findProdukByIdService->execute(new FindProdukByIdRequest($id_produk));
            if($response->getError())
            {
                $this->view->setVar('error', $response->getMessage());
            }
            else
            {
                $this->view->setVar('produk', $response->getData());
            }
        }
    }

    public function ubahPostAction()
    {
        if(!$this->session->has('admin')) return $this->response->redirect('ebrenk/admin');
        if($this->request->isPost())
        {
            $id_produk = $this->request->getPost('id_produk');
            $nama_produk = $this->request->getPost('nama_produk');
            $harga_produk = $this->request->getPost('harga_produk');
            $deskripsi_produk = $this->request->getPost('deskripsi_produk');
            
            if($this->request->hasFiles() == true)
            {
                $baseLocation = 'assets/images/';
                foreach ($this->request->getUploadedFiles() as $file)
                {
                    $foto_produk = $baseLocation . $file->getName();
                    $file->moveTo($foto_produk);
                }
            }

            $response = $this->ubahProdukService->execute(new UbahProdukRequest($id_produk, $nama_produk, $harga_produk, $foto_produk, $deskripsi_produk));

            if($response->getError())
            {
                $this->view->setVar('error', $response->getMessage());
            }
            else
            {
                return $this->response->redirect('ebrenk/admin/produk');
            }
        }
    }

    public function tambahAction()
    {
        if(!$this->session->has('admin')) return $this->response->redirect('ebrenk/admin');
        if($this->request->isPost())
        {
            $nama_produk = $this->request->getPost('nama_produk');
            $harga_produk = $this->request->getPost('harga_produk');
            $deskripsi_produk = $this->request->getPost('deskripsi_produk');
            
            if($this->request->hasFiles() == true)
            {
                $baseLocation = 'assets/images/';
                foreach ($this->request->getUploadedFiles() as $file)
                {
                    $foto_produk = $baseLocation . $file->getName();
                    $file->moveTo($foto_produk);
                }
            }

            $response = $this->tambahProdukService->execute(new TambahProdukRequest($nama_produk, $harga_produk, $foto_produk, $deskripsi_produk));

            if($response->getError())
            {
                $this->view->setVar('error', $response->getMessage());
            }
            else
            {
                return $this->response->redirect('ebrenk/admin/produk');
            }
        }
    }
}
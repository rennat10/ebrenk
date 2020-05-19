<?php

namespace Ebrenk\Presentation\Controllers\Web;

use Phalcon\Mvc\Controller;

use Ebrenk\Application\TambahProduk\TambahProdukRequest;
use Ebrenk\Application\UbahProduk\UbahProdukRequest;
use Ebrenk\Application\FindProdukById\FindProdukByIdRequest;

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
    }

    public function homeAction()
    {

    }

    public function indexAction()
    {

    }

    public function keluarAction()
    {

    }

    public function detailAction($id)
    {
        
    }

    public function pembelianAction()
    {
        $pembelianList = $this->viewAllPembelianService->execute();
        $this->view->setVar('pembelianList', $pembelianList);
    }

    public function produkAction()
    {
        $produkList = $this->viewAllProdukService->execute();
        $this->view->setVar('produkList', $produkList);
    }

    public function pelangganAction()
    {
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
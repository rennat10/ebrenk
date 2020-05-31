<?php

use Ebrenk\Infrastructure\Persistence\SqlProdukRepository;
use Ebrenk\Infrastructure\Persistence\SqlPelangganRepository;
use Ebrenk\Infrastructure\Persistence\SqlPembelianRepository;
use Ebrenk\Infrastructure\Persistence\SqlPembelian_produkRepository;
use Ebrenk\Infrastructure\Persistence\SqlAdminRepository;
use Ebrenk\Infrastructure\Persistence\SqlKeranjangRepository;
use Ebrenk\Application\ViewAllProduk\ViewAllProdukService;
use Ebrenk\Application\UbahProduk\UbahProdukService;
use Ebrenk\Application\TambahProduk\TambahProdukService;
use Ebrenk\Application\HapusProduk\HapusProdukService;
use Ebrenk\Application\FindProdukById\FindProdukByIdService;
use Ebrenk\Application\ViewAllPelanggan\ViewAllPelangganService;
use Ebrenk\Application\HapusPelanggan\HapusPelangganService;
use Ebrenk\Application\ViewAllPembelian\ViewAllPembelianService;
use Ebrenk\Application\ViewDetail\ViewDetailService;
use Ebrenk\Application\FindPembelianById\FindPembelianByIdService;
use Ebrenk\Application\LoginAdmin\LoginAdminService;
use Ebrenk\Application\RegisterAdmin\RegisterAdminService;
use Ebrenk\Application\LoginPelanggan\LoginPelangganService;
use Ebrenk\Application\DaftarPelanggan\DaftarPelangganService;
use Ebrenk\Application\DataPelanggan\DataPelangganService;
use Ebrenk\Application\RiwayatBelanja\RiwayatBelanjaService;
use Ebrenk\Application\CariProduk\CariProdukService;
use Ebrenk\Application\TambahKeranjang\TambahKeranjangService;
use Ebrenk\Application\ViewKeranjang\ViewKeranjangService;
use Ebrenk\Application\HapusKeranjang\HapusKeranjangService;
use Ebrenk\Application\HapusKeranjangByPelanggan\HapusKeranjangByPelangganService;
use Ebrenk\Application\TambahPembelian\TambahPembelianService;
use Ebrenk\Application\TambahPembelianProduk\TambahPembelianProdukService;
use Phalcon\Mvc\View;

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};

$di['db'] = function() use($di) {
    $config = $di->get('config');

    $dbAdapter = $config->database->adapter;

    return new $dbAdapter([
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
    ]);
};

$di->set('sqlProdukRepository', function() use ($di) {
    return new SqlProdukRepository($di->get('db'));
});

$di->set('sqlPelangganRepository', function() use($di) {
    return new SqlPelangganRepository($di->get('db'));
});

$di->set('sqlPembelianRepository', function() use($di) {
    return new SqlPembelianRepository($di->get('db'));
});

$di->set('sqlPembelian_produkRepository', function() use ($di) {
    return new SqlPembelian_produkRepository($di->get('db'));
});

$di->set('sqlAdminRepository', function() use ($di) {
    return new SqlAdminRepository($di->get('db'));
});

$di->set('sqlKeranjangRepository', function() use ($di) {
    return new SqlKeranjangRepository($di->get('db'));
});

$di->setShared('viewAllProdukService', function() use ($di) {
    return new ViewAllProdukService($di->get('sqlProdukRepository'));
});

$di->setShared('hapusProdukService', function() use ($di) {
    return new HapusProdukService($di->get('sqlProdukRepository'));
});

$di->setShared('tambahProdukService', function() use ($di) {
    return new TambahProdukService($di->get('sqlProdukRepository'));
});

$di->setShared('ubahProdukService', function() use ($di) {
    return new UbahProdukService($di->get('sqlProdukRepository'));
});

$di->setShared('findProdukByIdService', function() use($di) {
    return new FindProdukByIdService($di->get('sqlProdukRepository'));
});

$di->setShared('viewAllPelangganService', function() use ($di) {
    return new ViewAllPelangganService($di->get('sqlPelangganRepository'));
});

$di->setShared('hapusPelangganService', function() use ($di) {
    return new HapusPelangganService($di->get('sqlPelangganRepository'));
});

$di->setShared('viewAllPembelianService', function() use ($di) {
    return new ViewAllPembelianService($di->get('sqlPembelianRepository'));
});

$di->setShared('viewDetailService', function() use ($di) {
    return new ViewDetailService($di->get('sqlPembelian_produkRepository'));
});

$di->setShared('findPembelianByIdService', function() use($di) {
    return new FindPembelianByIdService($di->get('sqlPembelianRepository'));
});

$di->setShared('loginAdminService', function() use($di) {
    return new LoginAdminService($di->get('sqlAdminRepository'));
});

$di->setShared('registerAdminService', function() use($di) {
    return new RegisterAdminService($di->get('sqlAdminRepository'));
});

$di->setShared('loginPelangganService', function() use ($di) {
    return new LoginPelangganService($di->get('sqlPelangganRepository'));
});

$di->setShared('daftarPelangganService', function() use($di) {
    return new DaftarPelangganService($di->get('sqlPelangganRepository'));
});

$di->setShared('dataPelangganService', function() use ($di) {
    return new DataPelangganService($di->get('sqlPelangganRepository'));
});

$di->setShared('riwayatBelanjaService', function() use ($di) {
    return new RiwayatBelanjaService($di->get('sqlPembelianRepository'));
});

$di->setShared('cariProdukService', function() use($di) {
    return new CariProdukService($di->get('sqlProdukRepository'));
});

$di->setShared('tambahKeranjangService', function() use($di) {
    return new TambahKeranjangService($di->get('sqlKeranjangRepository'));
});

$di->setShared('viewKeranjangService', function() use($di) {
    return new ViewKeranjangService($di->get('sqlKeranjangRepository'));
});

$di->setShared('hapusKeranjangService', function() use ($di) {
    return new HapusKeranjangService($di->get('sqlKeranjangRepository'));
});

$di->setShared('hapusKeranjangByPelangganService', function() use($di) {
    return new HapusKeranjangByPelangganService($di->get('sqlKeranjangRepository'));
});

$di->setShared('tambahPembelianService', function() use ($di) {
    return new TambahPembelianService($di->get('sqlPembelianRepository'));
});

$di->setShared('tambahPembelianProdukService', function() use ($di) {
    return new TambahPembelianProdukService($di->get('sqlPembelian_produkRepository'));
});
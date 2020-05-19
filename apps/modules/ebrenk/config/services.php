<?php

use Ebrenk\Infrastructure\Persistence\SqlProdukRepository;
use Ebrenk\Infrastructure\Persistence\SqlPelangganRepository;
use Ebrenk\Infrastructure\Persistence\SqlPembelianRepository;
use Ebrenk\Application\ViewAllProduk\ViewAllProdukService;
use Ebrenk\Application\UbahProduk\UbahProdukService;
use Ebrenk\Application\TambahProduk\TambahProdukService;
use Ebrenk\Application\HapusProduk\HapusProdukService;
use Ebrenk\Application\FindProdukById\FindProdukByIdService;
use Ebrenk\Application\ViewAllPelanggan\ViewAllPelangganService;
use Ebrenk\Application\HapusPelanggan\HapusPelangganService;
use Ebrenk\Application\ViewAllPembelian\ViewAllPembelianService;
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
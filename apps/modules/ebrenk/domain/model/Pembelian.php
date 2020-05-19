<?php

namespace Ebrenk\Domain\Model;

class Pembelian
{
    protected $id_pembelian;
    protected $id_pelanggan;
    protected $id_ongkir;
    protected $tanggal_pembelian;
    protected $total_pembelian;
    protected $status_pembelian;
    protected $resi_pengiriman;

    public function __construct($id_pembelian, $id_pelanggan, $id_ongkir, $tanggal_pembelian, $total_pembelian, $status_pembelian, $resi_pengiriman)
    {
        $this->id_pembelian = $id_pembelian;
        $this->id_pelanggan = $id_pelanggan;
        $this->id_ongkir = $id_ongkir;
        $this->tanggal_pembelian = $tanggal_pembelian;
        $this->total_pembelian = $total_pembelian;
        $this->status_pembelian = $status_pembelian;
        $this->resi_pengiriman = $resi_pengiriman;
    }

    public function getIdPembelian()
    {
        return $this->id_pembelian;
    }

    public function getIdPelanggan()
    {
        return $this->id_pelanggan;
    }

    public function getIdOngkir()
    {
        return $this->id_ongkir;
    }

    public function getTanggal()
    {
        return $this->tanggal_pembelian;
    }

    public function getTotal()
    {
        return $this->total_pembelian;
    }

    public function getStatus()
    {
        return $this->status_pembelian;
    }

    public function getResi()
    {
        return $this->resi_pengiriman;
    }

    public function rupiah()
    {
        return number_format($this->total_pembelian);
    }
}
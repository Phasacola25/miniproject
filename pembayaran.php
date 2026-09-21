<?php

// ==========================================
// INTERFACE PEMBAYARAN
// ==========================================

interface Pembayaran
{
    public function bayar($jumlah);
    public function getMetode();
    public function getInfo($jumlah);
}


// ==========================================
// CLASS TUNAI
// ==========================================

class Tunai implements Pembayaran
{
    private $uang;

    public function __construct($uang)
    {
        $this->uang = $uang;
    }

    public function bayar($jumlah)
    {
        if ($this->uang >= $jumlah) {
            return true;
        } else {
            return false;
        }
    }

    public function getMetode()
    {
        return "Tunai";
    }

    public function getInfo($jumlah)
    {
        $kembalian = $this->uang - $jumlah;

        return "Kembalian : Rp "
            . number_format($kembalian, 0, ',', '.');
    }
}


// ==========================================
// CLASS E-WALLET
// ==========================================

class EWallet implements Pembayaran
{
    private $saldo;

    public function __construct($saldo)
    {
        $this->saldo = $saldo;
    }

    public function bayar($jumlah)
    {
        if ($this->saldo >= $jumlah) {
            $this->saldo = $this->saldo - $jumlah;

            return true;
        } else {
            return false;
        }
    }

    public function getMetode()
    {
        return "E-Wallet";
    }

    public function getInfo($jumlah)
    {
        return "Sisa Saldo E-Wallet : Rp "
            . number_format($this->saldo, 0, ',', '.');
    }
}

?>
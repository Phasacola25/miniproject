<?php

abstract class Kendaraan
{
    protected $merk;
    protected $nomorPlat;
    protected $hargaSewa;

    public function __construct($merk, $nomorPlat, $hargaSewa)
    {
        $this->merk = $merk;
        $this->nomorPlat = $nomorPlat;
        $this->hargaSewa = $hargaSewa;
    }

    abstract public function hitungBiayaSewa($hari);

    public function getInfo()
    {
        return "Merk: " . $this->merk .
               ", Nomor Plat: " . $this->nomorPlat .
               ", Harga Sewa: Rp " . $this->hargaSewa;
    }
}

?>
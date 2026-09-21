<?php

class Motor extends Kendaraan
{
    protected $jenisMotor;

    public function __construct($merk, $nomorPlat, $hargaSewa, $jenisMotor)
    {
        parent::__construct($merk, $nomorPlat, $hargaSewa);

        $this->jenisMotor = $jenisMotor;
    }

    public function hitungBiayaSewa($hari)
    {
        return $this->hargaSewa * $hari;
    }

    public function getInfo()
    {
        return "Motor " . $this->merk .
               ", Plat: " . $this->nomorPlat .
               ", Harga Sewa: Rp " . $this->hargaSewa .
               ", Jenis: " . $this->jenisMotor;
    }
}

?>
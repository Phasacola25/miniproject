<?php

class Mobil extends Kendaraan
{
    protected $jumlahKursi;

    public function __construct($merk, $nomorPlat, $hargaSewa, $jumlahKursi)
    {
        parent::__construct($merk, $nomorPlat, $hargaSewa);

        $this->jumlahKursi = $jumlahKursi;
    }

    public function hitungBiayaSewa($hari)
    {
        return $this->hargaSewa * $hari;
    }

    public function getInfo()
    {
        return "Mobil " . $this->merk .
               ", Plat: " . $this->nomorPlat .
               ", Harga Sewa: Rp " . $this->hargaSewa .
               ", Jumlah Kursi: " . $this->jumlahKursi;
    }
}
?>
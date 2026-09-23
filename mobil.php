<?php

class Mobil extends Kendaraan
{
    protected $jumlahKursi;

    public function __construct($nama,$merk, $nomorPlat, $hargaSewa, $jumlahKursi){
        parent::__construct($nama, $merk, $nomorPlat, $hargaSewa);

        
        if (!is_numeric($jumlahKursi) || $jumlahKursi <= 0){
            throw new InvalidArgumentException("Jumlah Kursi Tidak Valid");
        } $this->jumlahKursi = $jumlahKursi;
    }

    public function hitungBiayaSewa($hari){
        if (!is_numeric($hari) || $hari <= 0){
            throw new InvalidArgumentException(" Lama sewa harus lebih dari 0 hari");
        }
        return $this->getHargaSewa() *$hari;
    
    }

    public function getInfo(){
        return parent::getInfo() . "Jumlah Kursi : " . $this->jumlahKursi;
    }
}
?>
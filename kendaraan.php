<?php

abstract class Kendaraan {
    protected $nama;
    protected $merk;
    protected $nomorPlat;
    protected $hargaSewa;
    protected $ketersediaan = true;

    public function __construct($nama,$merk, $nomorPlat, $hargaSewa) {
        if (!is_numeric($hargaSewa)||$hargaSewa <= 0) {
            throw new InvalidArgumentException("Harga sewa harus lebih besar dari 0.");}

        $this->nama = $nama;
        $this->merk = $merk;
        $this->nomorPlat = $nomorPlat;
        $this->hargaSewa = $hargaSewa;
    }

    abstract public function hitungBiayaSewa($hari);

    public function getNamaKendaraan(){
        return $this->nama;
    }

    public function getHargaSewa() {
        return $this->hargaSewa;
    }
    
    public function ketersediaan() {
        return $this->ketersediaan;
    }

    public function setKetersediaan($ketersediaan){
        $this->ketersediaan = (bool) $ketersediaan;
    }

    public function getInfo(){
        $status = $this->ketersediaan ? "Tersedia" : "Tidak Tersedia";
      
        return "Nama Kendaraan : " . $this->nama . ",Merk: " . $this->merk .", Nomor Plat: " . $this->nomorPlat .", Harga Sewa: Rp " . number_format($this->hargaSewa, 0, ',', '.'). ", Status : ". $status;
    }
}

?>
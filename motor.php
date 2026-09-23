<?php

class Motor extends Kendaraan{

    protected $jenisMotor;

    public function __construct($nama, $merk, $nomorPlat, $hargaSewa, $jenisMotor)
    {
        parent::__construct($nama, $merk, $nomorPlat, $hargaSewa);

        if ($jenisMotor === ""){
            throw new InvalidArgumentException("Jenis Motor Tidak Boleh Kosong");
        }
        $this->jenisMotor = $jenisMotor;
    }

    public function hitungBiayaSewa($hari){
        if (!is_numeric($hari) || $hari <= 0){
            throw new InvalidArgumentException("Lama sewa harus lebih dari 0 hari");
        }
        return $this->gethargaSewa() * $hari;
    }

    public function getInfo(){

        return parents::getInfo(). "Jenis Motor : ". $this->jenisMotor;
    }
}

?>
<?php

class Pelanggan
{
    private $idPelanggan;
    private $namaP;
    private $noTelp;
    private $alamat;

    public function __construct($idPelanggan,$namaP,$noTelp,$alamat) {
        $this->setIdPelanggan($idPelanggan);
        $this->setNama($namaP);
        $this->setNoTelp($noTelp);
        $this->setAlamat($alamat);
    }

    public function getIdPelanggan(){
        return $this->idPelanggan;
    }

    public function setIdPelanggan($idPelanggan){
        if (trim($idPelanggan) === "") {
            throw new InvalidArgumentException("ID pelanggan tidak boleh kosong.");
        }

        $this->idPelanggan = $idPelanggan;
    }

    public function getNama(){
        return $this->namaP;
    }

    public function setNama($namaP){
        if (trim($namaP) === "") {
            throw new InvalidArgumentException("Nama pelanggan tidak boleh kosong.");
        }

        if (is_numeric($namaP)) {
            throw new InvalidArgumentException("Nama pelanggan tidak boleh berupa angka.");
        }

        $this->namaP = trim($namaP);
    }

    public function getNoTelp(){
        return $this->noTelp;
    }

    public function setNoTelp($noTelp){
        $noTelp = trim($noTelp);

        if ($noTelp === "") {
            throw new InvalidArgumentException("Nomor telepon tidak boleh kosong.");
        }
        $this->noTelp = $noTelp;
    }

    public function getAlamat(){
        return $this->alamat;
    }

    public function setAlamat($alamat){
        if (trim($alamat) === "") {
            throw new InvalidArgumentException("Alamat tidak boleh kosong.");
        }

        $this->alamat = trim($alamat);
    }

    public function tampilkanInfoPelanggan(){
        return "ID: " . $this->idPelanggan .
            " | Nama: " . $this->namaP .
            " | Telp: " . $this->noTelp .
            " | Alamat: " . $this->alamat;
    }
}
<?php

class Pelanggan
{
    private $idPelanggan;
    private $nama;
    private $noTelp;
    private $alamat;

    public function getIdPelanggan()
    {
        return $this->idPelanggan;
    }

    public function setIdPelanggan($idPelanggan)
    {
        $this->idPelanggan = $idPelanggan;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        if ($nama == "") {
            echo "Error: Nama pelanggan tidak boleh kosong.<br>";
        } else if (is_numeric($nama)) {
            echo "Error: Nama pelanggan tidak boleh berupa angka.<br>";
        } else {
            $this->nama = $nama;
        }
    }

    public function getNoTelp()
    {
        return $this->noTelp;
    }

    public function setNoTelp($noTelp)
    {
        if (is_numeric($noTelp)) {
            $this->noTelp = $noTelp;
        } else {
            echo "Error: Nomor Telepon harus berupa angka.<br>";
        }
    }

    public function getAlamat()
    {
        return $this->alamat;
    }

    public function setAlamat($alamat)
    {
        if ($alamat == "") {
            echo "Error: Alamat tidak boleh kosong.<br>";
        } else {
            $this->alamat = $alamat;
        }
    }

    public function tampilkanInfoPelanggan()
    {
        return "ID: " . $this->idPelanggan . " | Nama: " . $this->nama . " | Telp: " . $this->noTelp . " | Alamat: " . $this->alamat;
    }
}
?>
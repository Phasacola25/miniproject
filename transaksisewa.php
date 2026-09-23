<?php

class TransaksiSewa {
    private $pelanggan;
    private $kendaraan;
    private $lamaSewa;
    private $totalBiaya;
    private $pembayaran = ""; 

    public function __construct($pelanggan, $kendaraan, $lamaSewa) {
        $this->pelanggan = $pelanggan;
        $this->kendaraan = $kendaraan;
        $this->lamaSewa = $lamaSewa;
        
        $this->totalBiaya = $this->hitungTotalBiaya();
    }

    private function hitungTotalBiaya() {
        return $this->kendaraan->hitungBiayaSewa($this->lamaSewa);
    }

    public function setPembayaran($pembayaran) {
        $this->pembayaran = $pembayaran;
    }

    public function prosesTransaksi() {
        if ($this->kendaraan->ketersediaan() == false) {
            return "Gagal: Maaf, kendaraan sedang disewa.<br>";
        }

        if ($this->pembayaran == "") {
            return "Gagal: Silakan pilih metode pembayaran (Tunai/EWallet) terlebih dahulu.<br>";
        }

        $statusBayar = $this->pembayaran->bayar($this->totalBiaya);

        if ($statusBayar == true) {
            $this->kendaraan->setKetersediaan(false); 
            return $this->cetakStruk();
        } else {
            return "Transaksi Gagal: Pembayaran ditolak.<br>";
        }
    }

    public function cetakStruk() {
        $struk = "========== STRUK PENYEWAAN ==========<br>";
        $struk .= "Nama Pelanggan  : " . $this->pelanggan->getNama() . "<br>";
        $struk .= "Kendaraan       : " . $this->kendaraan->getNamaKendaraan() . "<br>";
        $struk .= "Lama Sewa       : " . $this->lamaSewa . " Hari<br>";
        $struk .= "Total Biaya     : Rp " . number_format($this->totalBiaya, 0, ',', '.') . "<br>";
        $struk .= "Status          : LUNAS<br>";
        $struk .= "=====================================<br>";
        
        return $struk;
    }
}

?>
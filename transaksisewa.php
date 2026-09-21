<?php

class TransaksiSewa {
    private $pelanggan;
    private $kendaraan;
    private $lamaSewa;
    private $totalBiaya;
    private $pembayaran;

    /**
     * Constructor untuk inisialisasi awal saat pelanggan menyewa.
     * Menerima object dari class Pelanggan (Rizqi) dan Kendaraan (Grey/Malik).
     */
    public function __construct($pelanggan, $kendaraan, $lamaSewa) {
        $this->pelanggan = $pelanggan;
        $this->kendaraan = $kendaraan;
        $this->lamaSewa = $lamaSewa;
        
        $this->totalBiaya = $this->hitungTotalBiaya();
    }

    /**
     * Menghitung total biaya (Harga Sewa Kendaraan per Hari x Lama Sewa)
     */
    private function hitungTotalBiaya() {
        // Asumsi: Class Kendaraan (dari Grey) memiliki method getHargaSewa()
        return $this->kendaraan->getHargaSewa() * $this->lamaSewa;
    }

    /**
     * Mengatur metode pembayaran yang dipilih oleh pelanggan.
     * Menerima object class Tunai / EWallet dari Interface Pembayaran (Deslo).
     */
    public function setPembayaran($pembayaran) {
        $this->pembayaran = $pembayaran;
    }
    
    public function prosesTransaksi() {
        if (!$this->kendaraan->isTersedia()) {
            return "Gagal: Maaf, kendaraan sedang disewa.\n";
        }

        if ($this->pembayaran === null) {
            return "Gagal: Silakan pilih metode pembayaran (Tunai/EWallet) terlebih dahulu.\n";
        }

        $statusBayar = $this->pembayaran->bayar($this->totalBiaya);

        if ($statusBayar) {
            $this->kendaraan->setStatus(false); 
            return $this->cetakStruk();
        } else {
            return "Transaksi Gagal: Pembayaran ditolak.\n";
        }
    }

    public function cetakStruk() {
        $struk = "========== STRUK PENYEWAAN ==========\n";
        $struk .= "Nama Pelanggan  : " . $this->pelanggan->getNama() . "\n";
        $struk .= "Kendaraan       : " . $this->kendaraan->getNamaKendaraan() . "\n";
        $struk .= "Lama Sewa       : " . $this->lamaSewa . " Hari\n";
        $struk .= "Total Biaya     : Rp " . number_format($this->totalBiaya, 0, ',', '.') . "\n";
        $struk .= "Status          : LUNAS\n";
        $struk .= "=====================================\n";
        
        return $struk;
    }
}
?>
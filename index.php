<?php

require_once __DIR__ . '/kendaraan.php';
require_once __DIR__ . '/mobil.php';
require_once __DIR__ . '/motor.php';
require_once __DIR__ . '/pelanggan.php';
require_once __DIR__ . '/pembayaran.php';
require_once __DIR__ . '/transaksisewa.php';


echo "<h2>APLIKASI SEWA KENDARAAN</h2>";

try {
    $pelanggan = new Pelanggan(
        "P001",
        "Budi Santoso",
        "08123456789",
        "Jakarta"
    );

    $mobil = new Mobil(
        "Avanza",
        "Toyota",
        "B1234AA",
        350000,
        7
    );

    $pembayaran = new Tunai(1200000);

    $transaksi = new TransaksiSewa(
        $pelanggan,
        $mobil,
        3
    );

    $transaksi->setPembayaran($pembayaran);

    echo $transaksi->prosesTransaksi();

} catch (Exception $error) {
    echo "Error: " . $error->getMessage();
}
?>
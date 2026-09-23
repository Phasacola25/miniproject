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


    $lamaSewa = 3;

    $transaksi = new TransaksiSewa(
        $pelanggan,
        $mobil,
        $lamaSewa
    );



    $transaksi->setPembayaran($pembayaran);



    $hasil = $transaksi->prosesTransaksi();


    echo "<h3>Data Pelanggan</h3>";
    echo "<p>";
    echo $pelanggan->tampilkanInfoPelanggan();
    echo "</p>";


    echo "<h3>Data Kendaraan</h3>";
    echo "<p>";
    echo $mobil->getInfo();
    echo "</p>";


    echo "<h3>Data Penyewaan</h3>";

    echo "<p>";
    echo "Lama Sewa : " . $lamaSewa . " Hari";
    echo "</p>";

    echo "<p>";
    echo "Harga Sewa per Hari : Rp "
        . number_format(
            $mobil->getHargaSewa(),
            0,
            ',',
            '.'
        );
    echo "</p>";


    echo "<h3>Hasil Transaksi</h3>";
    echo "<p>";
    echo $hasil;
    echo "</p>";


    echo "<h3>Informasi Pembayaran</h3>";

    echo "<p>";
    echo "Metode Pembayaran : "
        . $pembayaran->getMetode();
    echo "</p>";


    $total = $mobil->hitungBiayaSewa($lamaSewa);

    echo "<p>";
    echo "Total Pembayaran : Rp "
        . number_format(
            $total,
            0,
            ',',
            '.'
        );
    echo "</p>";


    echo "<p>";
    echo $pembayaran->getInfo($total);
    echo "</p>";


} catch (Exception $error) {

    echo "Error: " . $error->getMessage();

}

?>

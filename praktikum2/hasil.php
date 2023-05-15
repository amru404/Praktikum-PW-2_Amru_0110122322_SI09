<?php

    $nama = $_POST['nama'];
    $produk = $_POST['produk'];
    $jumlah= $_POST['jumlah'];

    if ($produk == 'kulkas') {
        $harga = 3100000;
        $total = $jumlah*$harga;
        echo 'Nama Customer : '.$nama;
        echo '<br>Nama Produk : '.$produk;
        echo '<br>Jumlah Beli : '.$jumlah;
        echo '<br>Total Harga : '. number_format($total,2,",",".");

    };
    if ($produk == 'tv') {
        $harga = 4200000;
        $total = $jumlah*$harga;
        echo 'Nama Customer : '.$nama;
        echo '<br>Nama Produk : '.$produk;
        echo '<br>Jumlah Beli : '.$jumlah;
        echo '<br>Total Harga : '. number_format($total,2,",",".");

    };
    if ($produk == 'mesincuci') {
        $harga = 3800000;
        $total = $jumlah*$harga;
        echo 'Nama Customer : '.$nama;
        echo '<br>Nama Produk : '.$produk;
        echo '<br>Jumlah Beli : '.$jumlah;
        echo '<br>Total Harga : '. number_format($total,2,",",".");
    };


?>
<?php

    class Tes {
        
    }

    $a = new Tes();

    // var_dump($a);

    class mobil {
        public  $nama,
                $merk,
                $warna;

        public function gas()
        {
            
        }

        public function rem()
        {
            
        }
    }


    $bmw = new mobil();


    class produk {
        public  $nama = "ini nama",
                $jenis ="ini jenis",
                $harga = 9999;


        public function __construct($nama, $jenis, $harga)
        {
            // echo "contruct = Otomatis berjalan ketika ada objek baru<br>";
            $this->nama = $nama;
            $this->jenis = $jenis;
            $this->harga = $harga;
        }

        public function printHarga()
        {
            return $this->harga;
        }

    }

    

    $produk1 = new produk('prep shirt','baju',200000);
    // $produk1->nama = "Supreme X Bape";
    // $produk1->jenis = "hoodie";
    // $produk1->harga = 6000000;

    // $produk2 = new produk();
    // $produk2->nama = 'Bape shirt';
    // $produk2->jenis = 'kaos';
    // $produk2->harga = 800000;
    // $produk2->coharga = 800;


    echo "Produk 1<br> Nama : $produk1->nama <br>Jenis : $produk1->jenis <br> Harga : ". $produk1->harga;
    echo "<br><br>";
    // echo "Produk 2 : $produk2->nama,$produk2->jenis,$produk2->harga";

    // var_dump($produk2);
?>

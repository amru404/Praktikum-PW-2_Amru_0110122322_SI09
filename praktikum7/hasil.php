<?php

    class Keterengan{
        public $nama,
                $bb,
                $tb,
                $umur,
                $jk;
                // $BMI = $bb/$tb*$tb;

        public function __construct($nama,$bb,$tb,$umur,$jk)
        {
            $this->nama = $nama;
            $this->bb = $bb;
            $this->tb = $tb;
            $this->umur = $umur;
            $this->jk = $jk;


            // $this->BMI = $BMI;
            

        }

        public function Hasil()
        {

            $pangkat = $_POST['tb'];
            $BMI = $BMI = $_POST['bb'] / $pangkat;

            if ($BMI ) {
                # code...
            }
        }
        
    }

    $ket1 = new Keterengan($_POST['nama'],$_POST['bb'],$_POST['tb'],$_POST['umur'],$_POST['jk'], $pangkat = $_POST['tb'] * $_POST['tb'],$BMI = $_POST['bb'] / $pangkat);


    echo "Nama : $ket1->nama <br> Berat Badan : $ket1->bb <br> Tinggi Badan : $ket1->tb <br> Umur : $ket1->umur <br> Jenis Kelamin : $ket1->jk <br> BMI: $BMI"
?>
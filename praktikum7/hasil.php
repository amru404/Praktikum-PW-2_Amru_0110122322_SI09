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

        public function BMI()
        {
            $pangkat = $_POST['tb'];
            return $BMI = $BMI = $_POST['bb'] / $pangkat;

        }

        public function Hasil()
        {

            $pangkat = $_POST['tb'];
            $BMI = $BMI = $_POST['bb'] / $pangkat;

            if ($BMI < 18.5) {
                return $keterangan = "Kekurangan Berat Badan";
            }elseif ($BMI >18.5 && $BMI < 24.9) {
                return $keterangan = "Normal (Ideal)";
            }elseif ($BMI >25.0 && $BMI < 29.9) {
                return $keterangan = "Kelebihan Berat Badan";
            }elseif ($BMI >30.0) {
                return $keterangan = "Kegemukan (Obesitas)";
            }
        }
        
    }

    $ket1 = new Keterengan($_POST['nama'],$_POST['bb'],$_POST['tb'],$_POST['umur'],$_POST['jk']);


    echo "Nama : $ket1->nama <br> Berat Badan : $ket1->bb <br> Tinggi Badan : $ket1->tb <br> Umur : $ket1->umur <br> Jenis Kelamin : $ket1->jk <br> BMI:" . $ket1->BMI() ."<br> Hasil : " . $ket1->Hasil();
?>
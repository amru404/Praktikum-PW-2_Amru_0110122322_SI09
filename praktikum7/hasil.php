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
            $pangkat = $_POST['tb'] * $_POST['tb'];
            $BMI = $BMI = $_POST['bb'] / $pangkat;
            $BMI = explode('0',$BMI);
            $BMI = $BMI[3];
            $BMI = substr($BMI,0,4);
            $BMI = $BMI/100;
            $BMI = number_format($BMI, 2, '.', '');
            return $BMI;
            // var_dump($BMI);
        }

        public function Hasil()
        {

            $pangkat = $_POST['tb'] * $_POST['tb'];
            $BMI = $BMI = $_POST['bb'] / $pangkat;
            $BMI = explode('0',$BMI);
            $BMI = $BMI[3];
            $BMI = substr($BMI,0,4);
            $BMI = $BMI/100;
            $BMI = number_format($BMI, 2, '.', '');

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

    // " . "(" . $ket1->Hasil() . ")
    $ket1 = new Keterengan($_POST['nama'],$_POST['bb'],$_POST['tb'],$_POST['umur'],$_POST['jk']);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
      .container{
        display: flex;
        justify-content: center;
      }
    </style>

    <title>Hasil!</title>
  </head>
  <body>
    

  
    <div class="container">
      
    <div class="card mt-4" style="width:30rem;">
      <!-- <img class="card-img-top" src="holder.js/100px180/" alt=""> -->
      <div class="card-body">
        <h4 class="card-title text-center">Hasil Evaluasi BMI</h4>
        <p class="card-text text-left">
          <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
              <?php  
              echo "Nama <br> Berat/Tinggi Badan <br> Umur <br> BMI <br> Hasil";
              ?>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
              <?php  
              echo " : $ket1->nama ($ket1->jk) <br> : $ket1->bb kg/$ket1->tb cm <br>  : $ket1->umur <br> : ".  $ket1->BMI() .  "<br> : " . $ket1->Hasil();
              ?>
            </div>
          </div>
        </p>
      <a href="dataPasien.php" class="btn btn-danger float-right">Kembali</a>
      </div>
    </div>
    
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
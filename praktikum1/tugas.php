<?php
    $M1 = ['nim'=>'01101', 'uts'=>80, 'uas'=>90 , 'tugas'=>90];
    $M2 = ['nim'=>'01102', 'uts'=>50, 'uas'=>60 , 'tugas'=>20];
    $M3 = ['nim'=>'01103', 'uts'=>50, 'uas'=>20 , 'tugas'=>20];
    $M4 = ['nim'=>'01104', 'uts'=>30, 'uas'=>50 , 'tugas'=>20];
    $M5 = ['nim'=>'01105', 'uts'=>70, 'uas'=>20 , 'tugas'=>50];


    $nilai = [$M1, $M2, $M3, $M4, $M5];
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data!</title>
  </head>
  <body>
      <div class="container">
    <h1>Table Nilai</h1>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">NO</th>
            <th scope="col">NIM</th>
            <th scope="col">UTS</th>
            <th scope="col">UAS</th>
            <th scope="col">Tugas</th>
            <th scope="col">Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor=1;
                foreach ($nilai as  $value) {
                    
                   
            ?>

                <tr>
                    <td><?=$nomor?> </td>
                    <td><?= $value['nim']?></td>
                    <td><?= $value['uts']?></td>
                    <td><?= $value['uas']?></td>
                    <td><?= $value['tugas']?></td>
                    <?php $nilai_akhir = ($value['uts'] + $value['uas']+$value['tugas'])/3 ?>
                    <td><?= number_format($nilai_akhir,2,',','.')?></td>
                    
                </tr>

            <?php
            $nomor++;
             }
            ?>

        </tbody>
        </table>

            </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
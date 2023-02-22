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

    <title>Hello, world!</title>
  </head>
  <body>
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
                    echo '<tr>';
                    echo '<th scope="row">'. $nomor .'<th>';
                    echo '<td>'. $value['nim'] .'<td>';
                    echo '<td>'. $value['uts'] .'<td>';
                    echo '<td>'. $value['uas'] .'<td>';
                    echo '<td>'. $value['tugas'] .'<td>';
                    // echo '<td>'. $value['nilai_akhir'] .'<td>';
                    $nilai_akhir = ($value['uts'] + $value['uas']+$value['tugas'])/3;
                    echo '<td>'.number_format($nilai_akhir,2,',','.').'</td>';
                    
                    echo '</tr>';
                    $nomor++;
                }
            ?>
        </tbody>
        </table>

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
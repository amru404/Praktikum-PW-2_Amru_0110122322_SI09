<?php
    if( !isset($_POST['submit'])){
        header('Location: index.php');
        exit;
    }

    $nama = $_POST['nama'];
    $matkul = $_POST['matkul'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $tugas = $_POST['tugas'];

    $nilai_akhir = ($uts + $uas + $tugas) /3 ;

    require_once('libfungsi.php');

    $nilai = $nilai_akhir;
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    

    <table class="table text-center" border="2">
        <thead>
            <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama</th>
            <th scope="col">Matkul</th>
            <th scope="col">UTS</th>
            <th scope="col">UAS</th>
            <th scope="col">Tugas</th>
            <th scope="col">Nilai Akhir</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Grade</th>
            </tr>
        </thead>
        <tbody>
            
        <tr>
            <?php
            $nomor = 1;
            ?>
                    <td><?=$nomor?> </td>
                    <td><?= $nama?></td>
                    <td><?= $matkul?></td>
                    <td><?= $uts?></td>
                    <td><?= $uas?></td>
                    <td><?= $tugas?></td>
                    <td><?= number_format($nilai_akhir,2,',','.')?></td>
                    <td><?= kelulusan($nilai)?></td>
                    <td><?= grade($nilai)?></td>

                    
        </tr>


        </tbody>
    </table>

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
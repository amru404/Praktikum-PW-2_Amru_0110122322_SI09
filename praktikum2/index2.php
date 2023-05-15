<?php

$_nama = $_POST['nama'];
$_matkul = $_POST['matkul'];
$_uts = $_POST['uts'];
$_uas = $_POST['uas'];
$_tugas = $_POST['tugas'];

$total = $_uts + $_uas + $_tugas /3;

    echo 'nama mahasisa : ' . $_nama;
    echo '<br> matkul : ' . $_matkul;
    echo '<br> uts : ' . $_uts;
    echo '<br> uas : ' . $_uas;
    echo '<br> tugas : ' . $_tugas;
    echo '<br> total : ' . number_format($total,2,",",".");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <p>nama <?php $_nama?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
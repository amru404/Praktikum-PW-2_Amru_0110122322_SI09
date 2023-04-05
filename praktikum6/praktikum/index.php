<?php
require_once 'koneksi.php';

$sql = "SELECT * FROM pelanggan";
$stmt = $com->prepare($sql);
$stmt->execute();

if(isset($_POST['submit'])){
    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_jk = $_POST['jk'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_email = $_POST['email'];
    $_kartu_id = $_POST['kartu_id'];

    $sql = "INSERT INTO pelanggan (kode, nama, jk, tmp_lahir, tgl_lahir, email, kartu_id)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $com->prepare($sql);
    $stmt->execute([$_kode, $_nama, $_jk, $_tmp_lahir, $_tgl_lahir, $_email, $_kartu_id]);

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        
    <a href="form.php" class="btn btn-primary mt-4">Tambah Pelanggan</a>
    <hr>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Email</th>
                <th>Kartu Id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $no = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
           
            ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $row['kode']?></td>
                <td><?= $row['nama']?></td>
                <td><?= $row['jk']?></td>
                <td><?= $row['tmp_lahir'] . " ". $row['tgl_lahir']?></td>
                <td><?= $row['email']?></td>
                <td><?= $row['kartu_id']?></td>
                <td>
                    <!--<a href="" class="btn btn-sm btn-success">read</a>  -->
                    <a href="edit.php?id=<?=$row['id']?>" class="btn btn-sm btn-warning">edit</a> <a href="delete.php?id=<?=$row['id']?>" class="btn btn-sm btn-danger">delt</a>
                </td>
            </tr>

            <?php
            $no++;
            }    
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
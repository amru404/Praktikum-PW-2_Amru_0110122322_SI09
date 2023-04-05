<?php

    require_once 'koneksi.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM vendor WHERE id = :id";
        $stmt = $com->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('Location: indexVendor.php');
    }


?>


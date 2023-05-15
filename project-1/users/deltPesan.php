<?php
ob_start();
// include database connection file
include_once("koneksi.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];
//  var_dump($id);
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM pesanan WHERE id=$id");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:keranjang.php");
?>
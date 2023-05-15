<?php
// include database connection file
include_once("dbkoneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_harga = $_POST['harga_beli'];
    $_stok = $_POST['stok'];
    $_minstok = $_POST['min_stok'];
    $_jenis = $_POST['jenis'];

        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE produk SET kode='$_kode',nama='$_nama',harga_beli='$_harga',harga_jual='$_harga',
    stok='$_stok',min_stok='$_minstok',jenis='$_jenis' = WHERE id=$id");
    
    echo $id;
    // Redirect to homepage to display updated user in list
    header("Location: list_produk.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $_kode = $user_data['kode'];
    $_nama = $user_data['nama'];
    $_harga_beli = $user_data['harga_beli'];
    $_harga_jual = $user_data['harga_jual'];
    $_stok = $user_data['stok'];
    $_minstok = $user_data['min_stok'];
    // $_jenis = $user_data['jenis'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="">
        <table border="0">
            <tr> 
                <td>kode</td>
                <td><input type="text" name="kode" value=<?php echo $_kode;?>></td>
            </tr>
            <tr> 
                <td>nama</td>
                <td><input type="text" name="nama" value=<?php echo $_nama;?>></td>
            </tr>
            <tr> 
                <td>harga_beli</td>
                <td><input type="text" name="harga_beli" value=<?php echo $_harga_beli;?>></td>
            </tr>
            <tr> 
                <td>harga_jual</td>
                <td><input type="text" name="harga_jual" value=<?php echo $_harga_jual;?>></td>
            </tr>
            <tr> 
                <td>stok</td>
                <td><input type="text" name="stok" value=<?php echo $_stok;?>></td>
            </tr>
            <tr> 
                <td>min_stok</td>
                <td><input type="text" name="min_stok" value=<?php echo $_minstok;?>></td>
            </tr>      
            <tr>
              
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
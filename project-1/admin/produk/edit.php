<?php
ob_start();
// include database connection file
include_once("../koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $hargaJual = $_POST['harga_jual'];
    $hargaBeli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $minstok = $_POST['min_stok'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE produk SET kode='$kode',nama='$nama',harga_jual='$hargaJual',harga_beli='$hargaBeli',stok='$stok',min_stok='$minstok',deskripsi='$deskripsi',kategori_produk_id='$kategori' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE id=$id");
 
while($produk = mysqli_fetch_array($result))
{
    $kode = $produk['kode'];
    $nama = $produk['nama'];
    $hargaJual = $produk['harga_jual'];
    $hargaBeli = $produk['harga_beli'];
    $stok = $produk['stok'];
    $minstok = $produk['min_stok'];
    $deskripsi = $produk['deskripsi'];
    $kategori = $produk['kategori_produk_id'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Produk</title>

    <!-- Custom fonts for this template-->
    <link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Ajam Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../../users/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="../kategori/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Kategori</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../produk/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../pesanan/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pesanan</span></a>
            </li>

          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                 

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Amru Ajam</span>
                                <img class="img-profile rounded-circle"
                                    src="../template/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
                        </div>
                        <!-- <a class="btn btn-primary m-3" style="width:auto;" href="add.php">Tambah Kategori</a> -->
                        <div class="card-body">                
                        <form action="edit.php" method="POST">
                        <div class="form-group row">
                            <label for="kode" class="col-4 col-form-label">Kode </label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="kode" name="kode" type="text" value=<?= $kode;?> required class="form-control">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="nama" class="col-4 col-form-label">Nama </label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="nama" name="nama" type="text" value=<?= $nama;?> required class="form-control">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="harga_jual" class="col-4 col-form-label">harga_jual </label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="harga_jual" name="harga_jual" type="text" value=<?= $hargaJual;?> required class="form-control">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="harga_beli" class="col-4 col-form-label">harga_beli </label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="harga_beli" name="harga_beli" type="text" value=<?= $hargaBeli;?> required class="form-control">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="stok" class="col-4 col-form-label">stok </label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="stok" name="stok" type="text" value=<?= $stok;?> required class="form-control">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="min_stok" class="col-4 col-form-label">Min Stok</label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="min_stok" name="min_stok" type="text" value=<?= $minstok;?> required class="form-control">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                            <div class="col-8">
                            <textarea required class="form-control" id="deskripsi"  name="deskripsi" rows="3"><?= $deskripsi;?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="kategori" class="col-4 col-form-label">Kategori Produk</label> 
                        <div class="col-8">
                            <?php 
                                $sqljenis = "SELECT * FROM kategori_produk";
                                $rsjenis = $mysqli->query($sqljenis);
                            ?>
                        <select id="kategori" name="kategori" class="custom-select" value="<?= $deskripsi?>">
                            <?php 
                                foreach($rsjenis as $rowjenis){
                            ?>
                                <option value="<?=$rowjenis['id']?>"><?=$rowjenis['nama']?></option>
                            <?php
                                }
                            ?>
                            <!--
                            <option value="1">Elektronik</option>
                            <option value="2">Furniture</option>
                            <option value="3">Makanan</option>-->

                        </select>
                        </div>
                    </div> 

                        </div> 
                        
                        <td><input type="hidden" name="id" value=<?= $_GET['id'];?>></td>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="update" type="submit" value="Update" class="btn btn-primary">Submit</button>
                            <a href="index.php" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../template/vendor/jquery/jquery.min.js"></script>
    <script src="../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../template/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../template/js/demo/datatables-demo.js"></script>

</body>

</html>
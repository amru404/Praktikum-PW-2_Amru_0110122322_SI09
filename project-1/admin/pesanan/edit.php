<?php
ob_start();
// include database connection file
include_once("../koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $tanggal = $_POST['tanggal'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $alamat = $_POST['alamat_pemesan'];
    $nohp = $_POST['no_hp'];
    $email = $_POST['email'];
    $qty = $_POST['qty'];
    $deskripsi = $_POST['deskripsi'];
    $produk = $_POST['produk_id'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE pesanan SET tanggal='$tanggal',nama_pemesan='$nama_pemesan',alamat_pemesan='$alamat',no_hp='$nohp',email='$email',qty='$qty',deskripsi='$deskripsi',produk_id='$produk' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    // var_dump($result);
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM pesanan WHERE id=$id");
 
while($pesanan = mysqli_fetch_array($result))
{
    $tanggal = $pesanan['tanggal'];
    $nama_pemesan = $pesanan['nama_pemesan'];
    $alamat = $pesanan['alamat_pemesan'];
    $nohp = $pesanan['no_hp'];
    $email = $pesanan['email'];
    $qty = $pesanan['qty'];
    $deskripsi = $pesanan['deskripsi'];
    $produk = $pesanan['produk_id'];
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

    <title>Edit Pesanan</title>

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
                            <label for="tanggal" class="col-4 col-form-label">tanggal </label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="tanggal" name="tanggal" type="date" value=<?= $tanggal;?>  class="form-control">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="nama_pemesan" class="col-4 col-form-label">Nama_pemesan </label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="nama_pemesan" name="nama_pemesan" type="text" value=<?= $nama_pemesan;?> class="form-control">
                            </div>
                            </div>

                            <!-- <div class="form-group row">
                            <label for="alamat_pemesan" class="col-4 col-form-label">Alamat Pemesan </label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="alamat_pemesan" name="alamat_pemesan" type="text" value= class="form-control">
                            </div>
                            </div> -->

                            <div class="form-group row">
                            <label for="alamat_pemesan" class="col-4 col-form-label">Alamat Pemesan</label>
                            <div class="col-8">
                            <textarea class="form-control" required id="alamat_pemesan"  name="alamat_pemesan" rows="3"><?= $alamat;?></textarea>
                            </div>
                        </div>

                            <div class="form-group row">
                            <label for="no_hp" class="col-4 col-form-label">No Handphone </label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="no_hp" name="no_hp" type="number" value=<?= $nohp;?> class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">email </label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="email" name="email" type="text" value=<?= $email;?> class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="qty" class="col-4 col-form-label">Quantity</label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="qty" name="qty" type="number" value=<?= $qty;?> class="form-control" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                            <div class="col-8">
                            <textarea class="form-control" required id="deskripsi"  name="deskripsi" rows="3"><?= $deskripsi;?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="produk_id" class="col-4 col-form-label">Produk</label> 
                        <div class="col-8">
                            <?php 
                                $sqljenis = "SELECT * FROM produk";
                                $rsjenis = $mysqli->query($sqljenis);
                            ?>
                        <select id="produk_id" name="produk_id" class="custom-select" value="<?= $deskripsi?>">
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
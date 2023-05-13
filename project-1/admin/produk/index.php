<?php
// Create database connection using config file
include_once("../koneksi.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM produk ORDER BY id ASC");

if(isset($_POST['Submit'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $hargaJual = $_POST['harga_jual'];
        $hargaBeli = $_POST['harga_beli'];
        $stok = $_POST['stok'];
        $minstok = $_POST['min_stok'];
        $deskripsi = $_POST['deskripsi'];
        $kategori = $_POST['kategori'];
        $gambar_produk = $_FILES['gambar_produk']['name'];
      
        
        if($gambar_produk != "") {
            $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
            $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
            $ekstensi = strtolower(end($x));
            var_dump($ekstensi);
            $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
            $angka_acak     = rand(1,999);
            $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
                  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                          move_uploaded_file($file_tmp, '../../gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                            // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                            $query = "INSERT INTO produk(kode,nama,harga_jual,harga_beli,stok,
                            min_stok,deskripsi,gambar_produk,kategori_produk_id) VALUES('$kode','$nama','$hargaJual','$hargaBeli','$stok','$minstok','$deskripsi','$nama_gambar_baru','$kategori')";
                            $result = mysqli_query($mysqli, $query);
                            // periska query apakah ada error
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
                                     " - ".mysqli_error($mysqli));
                            } else {
                              //tampil alert dan akan redirect ke halaman index.php
                              //silahkan ganti index.php sesuai halaman yang akan dituju
                              echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                            }
          
                      } else {     
                       //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                          echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
                      }
          } else {
             $query = "INSERT INTO produk(kode,nama,harga_jual,harga_beli,stok,
             min_stok,deskripsi,kategori_produk_id) VALUES('$kode','$nama','$hargaJual','$hargaBeli','$stok','$minstok','$deskripsi','$kategori')";
                            $result = mysqli_query($mysqli, $query);
                            // periska query apakah ada error
                            if(!$result){
                                die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
                                     " - ".mysqli_error($mysqli));
                            } else {
                              //tampil alert dan akan redirect ke halaman index.php
                              //silahkan ganti index.php sesuai halaman yang akan dituju
                              echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                            }
          }
        header("Location:index.php");
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

    <title>Produk</title>

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
                            <h6 class="m-0 font-weight-bold text-primary">Produk</h6>
                        </div>
                        <a class="btn btn-primary m-3" style="width:auto;" href="add.php">Tambah Produk</a>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Min Stok</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <tr>
                                        <?php  
                                            $no = 1;
                                            foreach ($result as $produk) {
                                        ?>
                                            <tr>
                                
                                                <td><?= $no?></td>
                                                <td><?= $produk['nama'] ?></td>
                                                <td><?= $produk['harga_jual'] ?></td>
                                                <td><?= $produk['stok'] ?></td>
                                                <td><?= $produk['min_stok'] ?></td>
                                                
                                                <td><img src="../../gambar/<?= $produk['gambar_produk']; ?>" style="width: 120px;"></td>
                                                <td><a class="btn btn-sm btn-success" href="read.php?id=<?=$produk['id']?>">View</a> <a class="btn btn-sm btn-warning" href="edit.php?id=<?=$produk['id']?>">Edit</a> <a class="btn btn-sm btn-danger" href="delt.php?id=<?=$produk['id']?>">Delete</a></td>
                                
                                                <?php
                                            $no++;
                                        }
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
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

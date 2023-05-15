<?php
ob_start();
// Create database connection using config file
include_once("koneksi.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM pesanan ORDER BY id ASC");
$date = date('Y/m/d');
// var_dump($date);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="template/img/apple-icon.png">
  <link rel="icon" type="image/png" href="template/img/favicon.png">
  <title>
    keranjang
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="template/css/nucleo-icons.css" rel="stylesheet" />
  <link href="template/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="template/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS Files -->
  <link id="pagestyle" href="template/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  
  <style>
    .btn .bx {
      vertical-align: inherit;
      margin-top: -3px;
      font-size: 1.15rem;
    }
    
    .form-control {
      height: calc(2.5rem + 2px);
      padding: 0.5rem 1.5rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: 0.3rem;
    }
    
    .btn {
      font-size: 1rem;
      padding: 0.5rem 0.75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: 0.25rem;
    }
    
    .bx.icon-single {
      font-size: 1.5rem;
    }
    
    .form-inline .form-control {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }
    
    .form-inline .btn {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }
    
    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) {
    }
    
    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) {
      .form-inline .form-control {
        width: 210px;
      }
    }
    
    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {
      .form-inline .form-control {
        width: 440px;
      }
    }
    
    /* Extra large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
      .form-inline .form-control {
        width: 600px;
      }
    }
    
    .sub-menu.navbar-light .navbar-nav .active > .nav-link,
    .sub-menu.navbar-light .navbar-nav .nav-link.active,
    .sub-menu.navbar-light .navbar-nav .nav-link.show,
    .sub-menu.navbar-light .navbar-nav .show > .nav-link {
      border-bottom: 3px solid rgb(255, 170, 0);
      color: rgb(255, 170, 0);
    }
    
    .navbar .navbar-toggler {
      border: none;
    }
    
    .navbar-light .navbar-toggler:focus {
      outline: none;
    }
    .navbar .nav-link {
      color : white;
    }
    
    .navbar {
      padding: 1rem;
    }
    
    .main-menu {
      position: relative;
      z-index: 3;
    }
    
    .sub-menu {
      position: relative;
      z-index: 2;
      padding: 0 1rem;
    }
    
    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) {
      .sub-menu {
        padding: 0 1rem;
      }
    
      .sub-menu.navbar-expand-md .navbar-nav .nav-link {
        padding: 1rem 1.5rem;
      }
    }

    .navbar-light .navbar-nav .nav-link {
    color: white;
}
    
    .navbar.bg-light {
      background: #5c74dc !important;
      box-shadow: 0px 2px 15px 0px rgba(0, 0, 0, 0.1);
      color: white;
    }
    
    .user-dropdown .nav-link {
      padding: 0.15rem 0;
    }
    
    #sidebar {
      background: #5c74dc;
      height: 100%;
      left: -100%;
      top: 0;
      bottom: 0;
      overflow: auto;
      position: fixed;
      transition: 0.4s ease-in-out;
      color: white;
      width: 84%;
      z-index: 5001;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
      padding: 1.25rem 1rem 1rem;
    }
    
    #sidebar.active {
      left: 0;
    }
    
    #sidebar .sidebar-header {
      background: #5c74dc;
      color: white;

      border-bottom: 1px solid #e4e4e4;
      padding-bottom: 1.5rem;
    }
    
    #sidebar ul.components {
      padding: 20px 0;
      border-bottom: 1px solid #e4e4e4;
      color: white;

      margin-bottom: 40px;
    }
    
    #sidebar ul p {
      color: #fff;
      padding: 10px;
    }
    
    #sidebar ul li a {
      padding: 10px 16px;
      font-size: 1.1em;
      display: block;
      color: #ffffff;
    }
    
    #sidebar ul li a:hover {
      color: #7386d5;
      background: #fff;
    }
    
    #sidebar ul li.active > a,
    #sidebar a[aria-expanded="true"] {
      color: #007bff;
      background: #e6f2ff;
      border-radius: 6px;
    }
    
    a[data-toggle="collapse"] {
      position: relative;
    }
    
    #sidebar .links .dropdown-toggle::after {
      display: block;
      position: absolute;
      top: 50%;
      right: 20px;
      transform: translateY(-50%);
    }
    
    section {
      padding: 6rem;
      background: #e4e4e4;
      margin-bottom: 30px;
      position: relative;
      z-index: 1;
    }
    
    .overlay {
      background: rgba(0, 0, 0, 0.7);
      height: 100vh;
      left: 0;
      position: fixed;
      top: 0;
      -webkit-transition: all 0.5s ease-in-out;
      transition: all 0.5s ease-in-out;
      z-index: -1;
      width: 100%;
      opacity: 0;
    }
    
    .overlay.visible {
      opacity: 1;
      z-index: 5000;
    }
    
    /* .mobiHeader .menuActive~.overlay {
        opacity: 1;
        width: 100%;
    } */
    
    ul.social-icons {
      list-style-type: none;
      padding-left: 0;
      margin-bottom: 0;
    }
    
    ul.social-icons li {
      display: inline-block;
      margin-right: 0px;
      margin-bottom: 0;
    }
    
    #sidebar ul.social-icons li a {
      font-size: 24px;
    }
    
    .utility-nav {
      background: #e4e4e4;
      padding: 0.5rem 1rem;
    }
    
    .utility-nav p {
      margin-bottom: 0;
    }
    
    .search-bar {
      position: relative;
      z-index: 2;
      box-shadow: 0px 2px 15px 0px rgba(0, 0, 0, 0.1);
    }
    
    .search-bar .form-control {
      width: calc(100% - 45px);
    }
    
    .avatar {
      border-radius: 50%;
      width: 4.5rem;
      height: 4.5rem;
      margin-right: 8px;
    }
    
    .avatar.avatar-xs {
      width: 2.25rem;
      height: 2.25rem;
    }
    
    .user-dropdown .dropdown-menu {
      left: auto;
      right: 0;
    }
    
  
  .forms{
    
      margin-top: 10px;
      margin-bottom: 10px;
      position: relative;
  }
  
  .forms .fa-search{
  
      position: absolute;
      top:10px;
      left: 20px;
      color: #9ca3af;
  
  }
  
  .forms span{
  
          position: absolute;
      right: 17px;
      top: 3px;
      padding: 2px;
      border-left: 1px solid #d1d5db;
  
  }
  
  .left-pan{
      padding-left: 7px;
  }
  
  .left-pan i{
     
     padding-left: 10px;
  }
  
  .form-input{
  
      height: 35px;
      text-indent: 23px;
      border-radius: 5px;
  }
  
  .form-input:focus{
  
      box-shadow: none;
      border:none;
  }
  </style>

  <script>
    $(document).ready(function() {
      $("#sidebarCollapse").on("click", function() {
        $("#sidebar").addClass("active");
      });
    
      $("#sidebarCollapseX").on("click", function() {
        $("#sidebar").removeClass("active");
      });
    
      $("#sidebarCollapse").on("click", function() {
        if ($("#sidebar").hasClass("active")) {
          $(".overlay").addClass("visible");
          console.log("it's working!");
        }
      });
    
      $("#sidebarCollapseX").on("click", function() {
        $(".overlay").removeClass("visible");
      });
    });
    
  </script>
  
</head>


<div class="overlay"></div>
<div class="container-fluid" style="background-color:#5c74dc">

  <div class="row height d-flex justify-content-center align-items-center">

    <div class="col-md-6">

      <div class="forms">
        <i class="fa fa-search"></i>
        <input type="text" class="form-control form-input" placeholder="Search anything...">
        <span class="left-pan"><i class="fa fa-microphone"></i></span>
      </div>
      
    </div>
    
  </div>
  
</div>
<nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Produk </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="checkout.php">Keranjang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../admin/kategori/index.php">Admin</a>
        </li>
   
</nav>

<!-- Sidebar -->
<nav id="sidebar">
  <div class="sidebar-header" style="margin-top: 30px;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-10 pl-0">
          <a class="btn btn-primary" href="#"><i class="bx bxs-user-circle mr-1"></i> Log In</a>
        </div>

        <div class="col-2 text-left">
          <button type="button" id="sidebarCollapseX" class="btn btn-link">
                            <i class="bx bx-x icon-single"></i>
                        </button>
        </div>
      </div>
    </div>
  </div>

  <ul class="list-unstyled components links">
    <li class="active">
      <a href="#"><i class="bx bx-home mr-3 "></i> Home</a>
    </li>
    <li>
      <a href="#"><i class="bx bx-carousel mr-3"></i> Products</a>
    </li>
    <li>
      <a href="#"><i class="bx bx-book-open mr-3"></i> Schools</a>
    </li>
    <li>
      <a href="#"><i class="bx bx-crown mr-3"></i> Publishers</a>
    </li>
    <li>
      <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bx bx-help-circle mr-3"></i>
                    Support</a>
      <ul class="collapse list-unstyled" id="pageSubmenu">
        <li>
          <a href="#">Delivery Information</a>
        </li>
        <li>
          <a href="#">Privacy Policy</a>
        </li>
        <li>
          <a href="#">Terms & Conditions</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="#"><i class="bx bx-phone mr-3"></i> Contact</a>
    </li>
  </ul>
</nav>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header" >
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php"
        target="_blank">
        <img src="template/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Amr Shopp</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <img src="template/control-panel.svg" style="height:25px">
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="checkout.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <img src="template/cart.svg" style="height:25px">
            </div>
            <span class="nav-link-text ms-1">Keranjang</span>
          </a>
        
        </li>
      </ul>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->

    <!-- End Navbar -->


    <div class="container-fluid py-4">
    

        
        <div class="row" >
          <?php
            foreach ($result as $datapesanan) {
                  
          ?>
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"  style="display:flex;justify-content:center;">
            <div class="card mt-4" style="width: 100%;">
              <div class="card-body">
              <a style="width:4%;" href="deltPesan.php?id=<?=$datapesanan['id']?>" class="float-right mb-3 mr-4 ml-3"><i class="fa-solid fa-trash " style="color: #ff1f1f;"></i></a>
              <div class="row">
                <div class="col-12 col-md-3 col-sm-6 col-xl-3 col-lg-3">
                  <div class="container" style="display:flex;justify-content:center">
                  <?php 
                  $id = $datapesanan['produk_id'];
                  $query = "SELECT * FROM produk where id=$id";
                  $result = $mysqli->query($query);
                  $dataproduk = $result->fetch_assoc();
                  
                  ?>
                  <img src="../gambar/<?= $dataproduk['gambar_produk']; ?>" style="width:100%;height:100%" class="mt-3">
                    </div>

                  </div>
                <div class="col-12 col-md-9 col-sm-6 col-xl-9 col-lg-9">
                 
                  <h5 class="card-title text-left"><?= $dataproduk['nama']?></h5>
              <h5 class="card-title"></h5>
              <?php
                
              ?>
                  <h5 class="card-title text-right"><?= $datapesanan['nama_pemesan']?></h5>
                  <p class="card-text" style="margin-top:-20px;"><?= $datapesanan['alamat_pemesan']?></p>
  
                  <div class="row">
                    <div class="col-6">
                      <p>Deskripsi : <?= $datapesanan['deskripsi']?></p>
                    </div>
                    <div class="col-6">
                      <p class="text-right">Quantity : <?= $datapesanan['qty']?></p>
                    </div>
                  </div>
                  <div class="delt">
                      
                  </div>
                </div>
              </div>
              
              </div>
            </div>
          </div>
          <?php
        }          
          ?>
        </div>

        </div>

      </div>
    </div>
    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About
                  Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                  target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary"
              onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white"
            onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default"
            onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free
          Download</a>
        <a class="btn btn-outline-dark w-100"
          href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard"
            data-icon="octicon-star" data-size="large" data-show-count="true"
            aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard"
            class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard"
            class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="template/js/core/popper.min.js"></script>
  <script src="template/js/core/bootstrap.min.js"></script>
  <!-- <script src="template/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="template/js/plugins/smooth-scrollbar.min.js"></script> -->
  <script src="template/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="template/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
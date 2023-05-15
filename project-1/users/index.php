<?php
ob_start();
// Create database connection using config file
include_once("koneksi.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM produk ORDER BY id ASC");
$date = date('Y/m/d');
// var_dump($date);


if(isset($_POST['Submit'])) {
        $tanggal = $_POST['tanggal'];
        $nama_pemesan = $_POST['nama_pemesan'];
        $alamat = $_POST['alamat_pemesan'];
        $nohp = $_POST['no_hp'];
        $email = $_POST['email'];
        $qty = $_POST['qty'];
        $deskripsi = $_POST['deskripsi'];
        $produk_id = $_POST['produk_id'];
        
        // include database connection file
        include_once("koneksi.php");
                
        // Insert user data into table
        $hasil = mysqli_query($mysqli, "INSERT INTO pesanan(tanggal,nama_pemesan,alamat_pemesan,no_hp,email,
        qty,deskripsi,produk_id) VALUES('$tanggal','$nama_pemesan','$alamat','$nohp','$email','$qty','$deskripsi','$produk_id')");
        
        header("Location:index.php");
    }

?>


<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>The Plaza - eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="The Plaza eCommerce Template">
	<meta name="keywords" content="plaza, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="template/img/belanja.png" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="template/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="template/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="template/css/owl.carousel.css"/>
	<link rel="stylesheet" href="template/css/style.css"/>
	<link rel="stylesheet" href="template/css/animate.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
    <?php
        include_once ('template/navbar.php');
    ?>

	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="template/bg.jpg" style="background-repeat:no-repeat; background-size:cover">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="hs-left"><img src="../gambar/balen.png" alt=""></div>
				<div class="hs-right">
					<div class="hs-content">
						<div class="price">from Rp.19.000.000</div>
						<h2><span>2022</span> <br>Rainbow</h2>
						<a href="" class="site-btn bg-danger">Sold</a>
					</div>	
				</div>
			</div>
			<div class="hs-item">
				<div class="hs-left"><img src="../gambar/nike.png" alt=""></div>
				<div class="hs-right">
					<div class="hs-content">
						<div class="price">from Rp. 120.000.000</div>
						<h2><span>2020</span> <br>Mag collection</h2>
						<a href="" class="site-btn bg-danger">Sold</a>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	
	<!-- Intro section -->
	<section class="intro-section spad pb-0">
		<div class="section-title">
			<h2>Premium products</h2>
			<p>We recommend</p>
		</div>
		<div class="intro-slider">
			<ul class="slidee">
                <?php 
                    foreach ($result as $dataproduk) {
                ?>
				<li>
					<div class="intro-item">
						<figure>
							<img src="../gambar/<?= $dataproduk['gambar_produk']; ?>" alt="#">
						</figure>
						<div class="product-info">
							<h5><?= $dataproduk['nama']?></h5>
							<p><?= "Rp " . number_format($dataproduk['harga_jual'],0,',','.')?></p>
							<a href="#product-section" class="site-btn btn-line">View Data Produk</a>
						</div>
					</div>
				</li>
				<?php
                    }
                ?>
			</ul>
		</div>
		<div class="container">
			<div class="scrollbar">
				<div class="handle">
					<div class="mousearea"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->


	<!-- Featured section -->
	<div class="featured-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="featured-item">
						<img src="template/img/featured/featured-1.jpg" alt="">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="featured-item mb-0">
						<img src="template/img/featured/featured-2.jpg" alt="">
						<a href="#" class="site-btn">see more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Featured section end -->


	<!-- Product section -->
	<section class="product-section spad" id="product-section">
		<div class="container">
			<ul class="product-filter controls">
				<li class="control" data-filter=".new">New arrivals</li>
				<li class="control" data-filter="all">Recommended</li>
				<li class="control" data-filter=".best">Best sellers</li>
			</ul>
			<div class="row" id="product-filter">
            <?php 
                    foreach ($result as $dataproduk) {
                ?>
				<div class="mix col-lg-3 col-md-6 best">
					<div class="product-item">
						<figure>
							<img src="../gambar/<?= $dataproduk['gambar_produk']; ?>" style="width: 100%; height:200px"  alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<a href="detail.php?id=<?=$dataproduk['id']?>">
									<img src="template/img/icons/eye.png" alt="">
                                    <p>View</p>
                                    </a>
								</div>
								<div class="pi-m-right">
									<img src="template/img/icons/heart.png" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6><?= $dataproduk['nama']?></h6>
							<p><?= "Rp " . number_format($dataproduk['harga_jual'],0,',','.')?></p>
							<a href="detail.php?id=<?=$dataproduk['id']?>" class="site-btn btn-line">Details & Order</a>
						</div>
					</div>
				</div>
                <?php 
                    }
                ?>
            </div>
		</div>
	</section>
	<!-- Product section end -->


	<!-- Blog section -->	

	<!-- Blog section end -->	


	<!-- Footer top section -->	
	<section class="footer-top-section home-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-8 col-sm-12">
					<div class="footer-widget about-widget">
						<img src="template/img/belanja.png" class="footer-logo" alt="">
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<div class="cards">
							<img src="template/img/cards/5.png" alt="">
							<img src="template/img/cards/4.png" alt="">
							<img src="template/img/cards/3.png" alt="">
							<img src="template/img/cards/2.png" alt="">
							<img src="template/img/cards/1.png" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">usefull Links</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Sitemap</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Shipping & returns</h6>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Track Orders</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Shipping</a></li>
							<li><a href="#">Blog</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Contact</h6>
						<div class="text-box">
							<p>Your Company Ltd </p>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, </p>
							<p>+53 345 7953 32453</p>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer top section end -->	

		<!-- Footer section -->

        
		<!-- Footer section -->

	

	<!--====== Javascripts & Jquery ======-->
	<script src="template/js/jquery-3.2.1.min.js"></script>
	<script src="template/js/bootstrap.min.js"></script>
	<script src="template/js/owl.carousel.min.js"></script>
	<script src="template/js/mixitup.min.js"></script>
	<script src="template/js/sly.min.js"></script>
	<script src="template/js/jquery.nicescroll.min.js"></script>
	<script src="template/js/main.js"></script>
    </body>
</html>
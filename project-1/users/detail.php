<?php
ob_start();
// include database connection file
include_once("koneksi.php");

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
    $gambar = $produk['gambar_produk'];
    // $produk_id = $produk['produk_id'];
}
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
	
	<!-- Header section -->
    <?php
        include_once ('template/navbar.php');
    ?>
	<!-- Header section end -->


	<!-- Page Info -->
	<div class="page-info-section page-info">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="">Home</a> / 
				<a href="">Sales</a> /
                <?php 
                  $sql = "SELECT * FROM kategori_produk where id=$kategori";
                  $hasil = $mysqli->query($sql);
                  $dataproduk = $hasil->fetch_assoc();
                  
                  ?>
				<a href=""><?=$dataproduk['nama']?></a> /

				<span><?= $nama?></span>
			</div>
			<img src="img/page-info-art.png" alt="" class="page-info-art">
		</div>
	</div>
	<!-- Page Info end -->


	<!-- Page -->
	<div class="page-area product-page spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<figure>
						<img class="product-big-img"  src="../gambar/<?= $gambar; ?>" alt="">
					</figure>
					<!-- <div class="product-thumbs">
						<div class="product-thumbs-track">
							<div class="pt" data-imgbigurl="img/product/1.jpg"><img src="img/product/thumb-1.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/2.jpg"><img src="img/product/thumb-2.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/3.jpg"><img src="img/product/thumb-3.jpg" alt=""></div>
							<div class="pt" data-imgbigurl="img/product/4.jpg"><img src="img/product/thumb-4.jpg" alt=""></div>
						</div>
					</div> -->
				</div>
				<div class="col-lg-6">
					<div class="product-content">
						<h2><?= $nama?></h2>
						<div class="pc-meta">
							<h4 class="price"><?= $hargaJual?></h4>
							<div class="review">
								<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star is-fade"></i>
								</div>
								<span>(2 reviews)</span>
							</div>
						</div>
						<p><?= $deskripsi?></p>
						<div class="color-choose">
							<span>Colors:</span>
							<div class="cs-item">
								<input type="radio" name="cs" id="black-color" checked>
								<label class="cs-black" for="black-color"></label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="blue-color">
								<label class="cs-blue" for="blue-color"></label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="yollow-color">
								<label class="cs-yollow" for="yollow-color"></label>
							</div>
							<div class="cs-item">
								<input type="radio" name="cs" id="orange-color">
								<label class="cs-orange" for="orange-color"></label>
							</div>
						</div>
						<div class="size-choose">
							<span>Size:</span>
							<div class="sc-item">
								<input type="radio" name="sc" id="l-size" checked>
								<label for="l-size">L</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xl-size">
								<label for="xl-size">XL</label>
							</div>
							<div class="sc-item">
								<input type="radio" name="sc" id="xxl-size">
								<label for="xxl-size">XXL</label>
							</div>
						</div>
                        <!-- Button trigger modal -->
                        <button type="button" class="site-btn btn-line" data-toggle="modal" data-target="#exampleModal">
                        ADD TO CART
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">FORM BUY</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="detail.php" method="POST">
                     
                                <input id="tanggal"  type="hidden" name="tanggal" value="<?=$date?>" required  class="form-control">
                                <input id="produk_id"  type="hidden" name="produk_id" value="<?=$id?>" required  class="form-control">
                     


                        <div class="form-group row">
                            <label for="nama_pemesan" class="col-4 col-form-label">Nama Pemesan</label> 
                            <div class="col-8">
                            <div class="input-group">
                                </div> 
                                <input id="nama_pemesan" name="nama_pemesan" required type="text" class="form-control">
                            </div>
                            </div>


                        <!-- <div class="form-group row">
                            <label for="alamat_pemesan" class="col-4 col-form-label">Alamat</label> 
                            <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                </div>
                                </div> 
                                <input id="alamat_pemesan" name="alamat_pemesan" required type="number" class="form-control">
                            </div>
                            </div> -->

                            <div class="form-group row">
                            <label for="alamat_pemesan" class="col-4 col-form-label">Alamat</label>
                            <div class="col-8">
                            <textarea class="form-control" id="alamat_pemesan" required name="alamat_pemesan" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_hp" class="col-4 col-form-label">No Handphone</label> 
                            <div class="col-8">
                            <div class="input-group">
                                </div> 
                                <input id="no_hp" name="no_hp" required type="number" class="form-control">
                            </div>
                            </div>

                        <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">Email</label> 
                            <div class="col-8">
                            <div class="input-group">
                                </div> 
                                <input id="email" name="email" required type="email" class="form-control">
                            </div>
                            </div>
                        <div class="form-group row">
                            <label for="qty" class="col-4 col-form-label">quantity</label> 
                            <div class="col-8">
                            <div class="input-group">
                                </div> 
                                <input id="qty" name="qty" required type="number" class="form-control">
                            </div>
                            </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                            <div class="col-8">
                            <textarea class="form-control" required id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="produk_id" class="col-4 col-form-label">Produk</label> 
                        <div class="col-8">
                            <?php 
                                $sqljenis = "SELECT * FROM produk where id = $id";
                                // var_dump($sqljenis);
                                $rsjenis = $mysqli->query($sqljenis);
                            ?>
                        <select id="produk_id" name="produk_id" class="custom-select" disabled value="<?= $rowjenis['id']?>">
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
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="sumbit" name="Submit" class="btn btn-primary">Order</button>
                        </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                        </form>
                    </div>
                        </div>
                        </div>
					</div>
				</div>
			</div>
			<div class="product-details">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Description</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Additional information</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews (0)</a>
							</li>
						</ul>
						<div class="tab-content">
							<!-- single tab content -->
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
								<p><?= $deskripsi ?></p>
							</div>
							<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
							</div>
							<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center rp-title">
				<h5>Related products</h5>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src="img/products/1.jpg" alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="img/icons/eye.png" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="img/icons/heart.png" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>Long red Shirt</h6>
							<p>$39.90</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src="img/products/2.jpg" alt="">
							<div class="bache">NEW</div>
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="img/icons/eye.png" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="img/icons/heart.png" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>Hype grey shirt</h6>
							<p>$19.50</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src="img/products/3.jpg" alt="">
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="img/icons/eye.png" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="img/icons/heart.png" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>long sleeve jacket</h6>
							<p>$59.90</p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="product-item">
						<figure>
							<img src="img/products/4.jpg" alt="">
							<div class="bache sale">SALE</div>
							<div class="pi-meta">
								<div class="pi-m-left">
									<img src="img/icons/eye.png" alt="">
									<p>quick view</p>
								</div>
								<div class="pi-m-right">
									<img src="img/icons/heart.png" alt="">
									<p>save</p>
								</div>
							</div>
						</figure>
						<div class="product-info">
							<h6>Denim men shirt</h6>
							<p>$32.20 <span>RRP 64.40</span></p>
							<a href="#" class="site-btn btn-line">ADD TO CART</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<!-- Page end -->


	<!-- Footer top section -->	
	<section class="footer-top-section home-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-8 col-sm-12">
					<div class="footer-widget about-widget">
						<img src="img/logo.png" class="footer-logo" alt="">
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam fringilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<div class="cards">
							<img src="img/cards/5.png" alt="">
							<img src="img/cards/4.png" alt="">
							<img src="img/cards/3.png" alt="">
							<img src="img/cards/2.png" alt="">
							<img src="img/cards/1.png" alt="">
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
    <?php ?>
	<!-- Footer section end -->


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
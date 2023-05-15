<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container-fluid">

        <div class="row">
            <h4 class="ml-2 mt-5 mb-4">
                Ajam Shopp
            </h4>
        </div>
        <div class="card pt-4 pr-4 pl-4 pb-4">
            
        <div class="row">
            <div class="col-8">
                <form method="POST" action="">
                    <div class="form-group row">
                      <label for="nama" class="col-4 col-form-label">Nama customer</label> 
                      <div class="col-8">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fa fa-address-card"></i>
                            </div>
                          </div> 
                          <input id="nama" name="nama" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-4">Pilih Produk</label> 
                      <div class="col-8">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input name="produk" id="produk_0" type="radio" class="custom-control-input" value="tv"> 
                          <label for="produk_0" class="custom-control-label">tv</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input name="produk" id="produk_1" type="radio" class="custom-control-input" value="kulkas"> 
                          <label for="produk_1" class="custom-control-label">kulkas</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input name="produk" id="produk_2" type="radio" class="custom-control-input" value="mesincuci"> 
                          <label for="produk_2" class="custom-control-label">mesin cuci</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jumlah" class="col-4 col-form-label">jumlah</label> 
                      <div class="col-8">
                        <input id="jumlah" name="jumlah" type="text" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group row">
                      <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-success">Kirim</button>
                      </div>
                    </div>
                  </form>
            </div>
            <div class="col-4">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                    Daftar Harga
                    </button>
                    <button type="btton" class="list-group-item list-group-item-action">TV : 4.200.000</button>
                    <button type="button" class="list-group-item list-group-item-action">Kulkas : 3.100.000</button>
                    <button type="button" class="list-group-item list-group-item-action">Mesin Cuci : 3.800.000</button>
                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                        Harga dapat berubah setiap saat
                        </button>
                  </div>  
            </div>
        </div>
    </div>

    
    
    
</div>

        <?php if(isset($_POST['submit'])  && isset($_POST['produk']))  : ?>
    

    <?php

    $nama = $_POST['nama'];
    $produk = $_POST['produk'];
    $jumlah= $_POST['jumlah'];

    if ($produk == 'kulkas' && $jumlah >= 1) {
        $harga = 3100000;
        $total = $jumlah*$harga;
        echo 'Nama Customer : '.$nama;
        echo '<br>Nama Produk : '.$produk;
        echo '<br>Jumlah Beli : '.$jumlah;
        echo '<br>Total Harga : '. number_format($total,2,",",".");
        

    } elseif ($produk == 'tv' && $jumlah >= 1) {
        $harga = 4200000;
        $total = $jumlah*$harga;
        echo 'Nama Customer : '.$nama;
        echo '<br>Nama Produk : '.$produk;
        echo '<br>Jumlah Beli : '.$jumlah;
        echo '<br>Total Harga : '. number_format($total,2,",",".");

    } elseif ($produk == 'mesincuci' && $jumlah >= 1) {
        $harga = 3800000;
        $total = $jumlah*$harga;
        echo 'Nama Customer : '.$nama;
        echo '<br>Nama Produk : '.$produk;
        echo '<br>Jumlah Beli : '.$jumlah;
        echo '<br>Total Harga : '. number_format($total,2,",",".");
    };


    

    ?>
    <?php endif ?>

</body>
</html>
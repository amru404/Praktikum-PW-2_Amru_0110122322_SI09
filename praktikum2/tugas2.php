<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  <div class="container-fluid">
    <div class="card text-center mt-4 mb-4">
    <div class="card-header">
        Sistem penilaian
    </div>
    <div class="card-body">
        <h3 class="card-title">Form Nilai Siswa</h3>
        <hr>
        <form method="POST" action="">
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
                <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-address-card"></i>
                    </div>
                    </div> 
                    <input required id="nama" name="nama" type="text" class="form-control">
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label> 
                <div class="col-8">
                <select id="matkul" name="matkul" class="custom-select">
                    <option value="Dasar-Dasar Pemprograman">Dasar-Dasar Pemprograman</option>
                    <option value="Pemprograman Web 2">Pemprograman Web 2</option>
                    <option value="Basis Data">Basis Data</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="uts" class="col-4 col-form-label">Nilai UTS</label> 
                <div class="col-8">
                <input required id="uts" name="uts" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="uas" class="col-4 col-form-label">Nilai UAS</label> 
                <div class="col-8">
                <input required id="uas" name="uas" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="tugas" class="col-4 col-form-label">Nilai Tugas</label> 
                <div class="col-8">
                <input required id="tugas" name="tugas" type="text" class="form-control">
                </div>
            </div> 
            <div class="form-group row">
                <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
    </div>
    
    <hr>

    <h3>Data Nilai</h3>

    <div class="container-fluid">
    <table class="table" border="2">
        <thead>
            <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama</th>
            <th scope="col">Matkul</th>
            <th scope="col">UTS</th>
            <th scope="col">UAS</th>
            <th scope="col">Tugas</th>
            <th scope="col">Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>

        <?php if(isset($_POST['submit'])  && isset($_POST['tugas']))  : ?>
    

            <?php
            $nama = $_POST['nama'];
            $matkul = $_POST['matkul'];
            $uts = $_POST['uts'];
            $uas = $_POST['uas'];
            $tugas = $_POST['tugas'];

            $percen30 = 30;
            $percen35 = 35;

            $uts30 = ($percen30 / 100) * $uts;
            $uas35 = ($percen35 / 100) * $uas;
            $tugas35 = ($percen35 / 100) * $tugas;

            $totalnilai = $uts30 + $uas35 + $tugas35;


     
            $nomor=1;
            ?>

                <tr>
                    <td><?=$nomor?> </td>
                    <td><?= $nama?></td>
                    <td><?= $matkul?></td>
                    <td><?= $uts?></td>
                    <td><?= $uas?></td>
                    <td><?= $tugas?></td>
                    <td><?= number_format($totalnilai,2,',','.')?></td>
                    
                </tr>

            <?php
            $nomor++;
            ?>
         

        </tbody>
        </table>

        <table border="2" class="table" style="width:30%">
  <thead>
    <tr>
      <th scope="col">Keterangan</th>
      <th scope="col">Grade</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php
         
         if ($totalnilai >= 55) {
            echo "<td>Lulus</td>";
        }
        else {
            
            echo "<td>Tidak Lulus</td>";
        }

        if ($totalnilai >= 0 && $totalnilai <= 35) {
            echo "<td>E</td>";
        }elseif ($totalnilai >= 36 && $totalnilai <= 55) {
            echo "<td>D</td>";
        }elseif ($totalnilai >= 56 && $totalnilai <= 69) {
            echo "<td>C</td>";
        }elseif ($totalnilai >= 70 && $totalnilai <= 84) {
            echo "<td>B</td>";
        }elseif ($totalnilai >= 85 && $totalnilai <= 100) {
            echo "<td>A</td>";
        }else {
            echo "<td>I</td>";
        }
        
        ?>
           <?php endif ?>

    </tr>
 
  </tbody>
</table>
    </div>
    <div class="card-footer text-muted">
        Develop@AmruAzzam
    </div>
    </div>





</div>




   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
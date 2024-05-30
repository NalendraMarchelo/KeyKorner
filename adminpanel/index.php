<?php
require "session.php";
require "../koneksi.php";

$queryKategori= mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori= mysqli_num_rows($queryKategori);

$queryProduk= mysqli_query($con, "SELECT * FROM produk");
$jumlahProduk= mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dI+uDoYrk8PSfG7RE+ovE+CE3rhPi8GJ5y1b9o+hlGaaS/FGT/W4mSbYk4/06Xk2bD6wAcXwhlK2VfF5aq/lKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.kotak {
     border:solid;
}

.summary-kategori {
     background-color: #76ABAE;
     border-radius: 15px;
}

.summary-produk {
     background-color:#EEEEEE;
     border-radius: 15px;
}

.no-decoration {
     text-decoration: none;
}

</style>

</head>
<body>
     <?php require "navbar.php";?>
     <div class="container mt-5">
          <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-house"></i> Home
                    </li>
                </ol>
          </nav>
          <h2>Halo Admin!</h2>
          <div class="container mt-5">
    <div class="row">
        <div class="col-lg-4  col-md-6 col-12 mb-3">
          <div class="summary-kategori p-3">
            <div class="row">
                <div class="col-6">
                    <i class="fa-solid fa-list fa-7x"></i>
                </div>
                <div class="col-6">
                    <h3 class="fs-2">Kategori</h3>
                    <p class="fs-4"><?php echo $jumlahKategori;?> Kategori</p>
                    <p><a href="kategori.php" class="text-dark no-decoration">Lihat Detail</a></p>
                </div>
            </div>
          </div>
        </div>


        <div class="col-lg-4 col-md-6 col-12 mb-3">
          <div class=" summary-produk p-3">
            <div class="row">
                <div class="col-6">
                    <i class="fa-solid fa-box fa-7x"></i>
                </div>
                <div class="col-6">
                    <h3 class="fs-2">Produk</h3>
                    <p class="fs-4"><?php echo $jumlahProduk;?> Produk</p>
                    <p><a href="produk.php" class="text-dark no-decoration">Lihat Detail</a></p>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

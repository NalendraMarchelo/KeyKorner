<?php
     session_start();
     require "koneksi.php";

$nama = htmlspecialchars($_GET['nama']);
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama = '$nama'");
$produk =  mysqli_fetch_array($queryProduk);

$queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id !='$produk[id]' LIMIT 4");

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Toko Online | Detail produk</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
          .produk-terkait-image {
          height: 100%;
          width: 100%;
          object-fit: cover;
          object-position: center;
          }
    </style>
</head>

<body>
     <!-- Navbar -->
          <?php
               if (isset($_SESSION['user_id'])) {
                    require "navbar-log-in.php";
               } else {
                    require "navbar.php";
               }
          ?>
     <!-- End Navbar -->
     
     <!-- Detail Produk -->
     <div class="container-fluid py-5">
          <div class="container">
               <div class="row">
                    <!-- Breadcrumps -->
                    <nav aria-label="breadcrumb">
                                   <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">
                                             <a href="index.php" class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home </a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                             Produk
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                             <?php echo $produk['nama']; ?> <!-- Tampilkan nama kategori -->
                                        </li>
                                   </ol>
                              </nav>
                         <!-- End Breadcrumps -->
                    <div class="col-lg-5 mb-4">
                         <img src="image/<?php echo $produk['foto'];  ?>"class = "w-100" alt="">
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                         <h1><?php echo $produk['nama'];  ?></h1>
                         <p class="fs-5">
                              <?php echo $produk['detail'];  ?>
                         </p>
                         <p class="fs-3">
                              Rp <?php echo $produk['harga'];  ?>
                         </p>
                         <p class="fs-5">
                              Status Ketersediaan: <strong><?php echo $produk['ketersediaan_stok'];  ?></strong>
                         </p>
                              <a href="keranjang.php">
                                   <button class="btn btn-success form-control mt-3" type="submit" name="keranjangbtn">
                                        Masukan Keranjang
                                   </button>
                              </a>
                    </div>
               </div>
          </div>
     </div>
     <!-- End Detail Produk -->

     <!-- Produk Terkait -->
     <div class="container-fluid py-5 warna1">
          <div class="container">
               <h2 class="text-center text-white mb-5">Produk Terkait</h2>

               <div class="row">
<?php while ($data=mysqli_fetch_array($queryProdukTerkait)){ ?>
                    <div class="col-md-6 col-lg-3 mb-4">
                         <a href="produk-detail.php?nama=<?php echo $data['nama'];  ?>">
                              <img src="image/<?php echo $data['foto'];  ?>" class="img-fluid img-thumbnail produk-terkait-image" alt="">
                         </a>
                    </div>
<?php } ?>
               </div>
          </div>
     </div>
     <!-- End Produk Terkait -->

     <!-- Iklan -->
     
     <!-- End Iklan -->

     <!-- Footer -->
     <?php require "footer.php" ?>
     <!-- End Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

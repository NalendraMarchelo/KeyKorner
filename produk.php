<?php
     session_start();
     require "koneksi.php";

     $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

     // get produk by nama produk/keyword
     if(isset($_GET['keyword'])){
          $keyword = $_GET['keyword'];
          $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$keyword%'");
     }
     // get produk by kategori
     else if(isset($_GET['kategori'])){
          $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
          $kategoriId = mysqli_fetch_array($queryGetKategoriId);
          $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id = '$kategoriId[id]'");
     }
     // get produk default
     else {
          $queryProduk = mysqli_query($con, "SELECT * FROM produk");
     }
     $countData = mysqli_num_rows($queryProduk);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
          .banner-produk {
               height: 45vh;
               background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url("image/banner.png");
               background-size: cover;
               background-position: 50% 35%;
               color: white;
               display: flex;
               align-items: center;
               justify-content: center;
          }
          .no-decoration {
               text-decoration: none;
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

    <!-- Banner -->
    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
        </div>
    </div>
    <!-- End Banner -->

    <!-- Body -->
          <div class="container py-5">
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
                                   </ol>
                              </nav>
                         <!-- End Breadcrumps -->
                    <div class="col-lg-3 mb-5" >
                         <h3>Kategori</h3>
                         <ul class="list-group">
<?php
                         // Asumsikan $queryKategori sudah diinisialisasi sebelumnya
                              while ($kategori = mysqli_fetch_array($queryKategori)) {
?>
                                   <a href="produk.php?kategori=<?php echo htmlspecialchars($kategori['nama']); ?>" class="no-decoration">
                                             <li class="list-group-item"><?php echo htmlspecialchars($kategori['nama']); ?></li>
                                   </a>
<?php } ?>    
                         </ul>
                    </div>
                    <div class="col-lg-9" >
                         <h3 class="text-center mb-3">Produk</h3>
                         <!-- isi produk -->
                         <div class="row">
<?php
                              if($countData < 1){
?>
                                   <h5 class="text-center my-5" style="color:grey">Produk yang Dicari Tidak Tersedia</h5>
<?php                                   
                              }                         
?>
                              <?php while($produk = mysqli_fetch_array($queryProduk)){ ?>
                              <div class="col-md-4 mb-4">
                                   <div class="card h-100">
                                        <div class="image-box">
                                             <img src="image/<?php  echo $produk['foto']; ?>" class="card-img-top" alt="...">
                                        </div>
                                        <div class="card-body">
                                             <h4 class="card-title"><?php echo $produk['nama'];  ?></h4>
                                                       <p class="card-text text-truncate"><?php echo $produk['detail'];  ?></p>
                                                       <p class="card-text text-harga">Rp <?php echo $produk['harga'];  ?></p>
                                                       <a href="produk-detail.php?nama=<?php echo $produk['nama'];  ?>" class="btn warna1 text-white">Lihat Detail</a>
                                        </div>
                                   </div>
                              </div>
                              <?php  } ?>
                         </div>
                         <!-- End Isi Produk -->
                    </div>
               </div>
          </div>
    <!-- End Body -->

    <!-- Footer -->
          <?php require "footer.php" ?>
     <!-- End Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

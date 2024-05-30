<?php
     session_start();
     require "koneksi.php";
     $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Toko Online | Home</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dI+uDoYrk8PSfG7RE+ovE+CE3rhPi8GJ5y1b9o+hlGaaS/FGT/W4mSbYk4/06Xk2bD6wAcXwhlK2VfF5aq/lKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="css/style.css" />
     <style>
          .no-decoration {
               text-decoration: none;
          }

          .carousel-image {
        width: 100%;
        height: auto; /* Let the height adjust automatically */
        object-fit: cover;
    }

    @media (min-width: 576px) {
        .carousel-image {
            height: 400px;
        }
    }

    @media (min-width: 768px) {
        .carousel-image {
            height: 400px;
        }
    }

    @media (min-width: 992px) {
        .carousel-image {
            height: 500px;
        }
    }

    @media (min-width: 1200px) {
        .carousel-image {
            height: 600px;
        }
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

     <!-- Carousel -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="image/carou1.png" class="d-block w-100 carousel-image" alt="...">
        </div>
        <div class="carousel-item">
            <img src="image/carou3.png" class="d-block w-100 carousel-image" alt="...">
        </div>
        <div class="carousel-item">
            <img src="image/carou2.png" class="d-block w-100 carousel-image" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- End Carousel -->


     <!-- Highlight Kategori -->
     <div class="container-fluid mb-4 py-5">
          <div class="container text-center">
               <h3>Kategori Terlaris</h3>

               <div class="row mt-5">
                    <div class="col-md-4 mb-3">
                         <div class="highlighted-kategori kategori-terlaris1 d-flex justify-content-center align-items-center">
                              <h4 class="text-white "><a class="no-decoration" href="produk.php?kategori=Mechanical">Mechanical</a></h4>
                              
                         </div>
                    </div>
                    <div class="col-md-4 mb-3">
                         <div class="highlighted-kategori kategori-terlaris2 d-flex justify-content-center align-items-center">
                              <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Magnetic">Magnetic</a></h4>
                         </div>
                    </div>
                    <div class="col-md-4 mb-3">
                         <div class="highlighted-kategori kategori-terlaris3 d-flex justify-content-center align-items-center">
                              <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Keycaps">Keycaps</a></h4>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <!-- End Highlight Kategori -->

     <!-- About Us -->
     <div class="container-fluid warna1 py-5">
          <div class="container text-center warna2">
               <h3>Tentang Kami</h3>
               <p class="fs-5 mt-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis provident sequi architecto sunt modi reprehenderit fugit eos at non et. Iste, vel minus. In quam veritatis explicabo. Voluptates, perferendis hic magni tempora libero iure quae laboriosam nulla. Ullam eius, magnam quo nihil excepturi dolores magni ratione a quos qui officia eligendi itaque minima vero repudiandae nulla similique dignissimos quisquam, nisi voluptatibus fugit veritatis! Quasi, esse! Quibusdam consectetur dignissimos quaerat voluptatibus ipsa veniam porro, repellat omnis illum at ratione qui ut.
               </p>
          </div>
     </div>
     <!-- End About Us -->

     <!-- Produk -->
     <div class="container-fluid py-5">
          <div class="container text-center">
               <h3>Produk</h3>
                    <div class="row mt-5">
                         <?php while ($data = mysqli_fetch_array($queryProduk)){ ?> 
                         <div class="col-sm-6 col-md-4 mb-3">
                              <div class="card h-100">
                                   <div class="image-box">
                                        <img src="image/<?php echo $data['foto'];  ?>" class="card-img-top" alt="...">
                                   </div>
                                        <div class="card-body">
                                             <h4 class="card-title"><?php echo $data['nama'];  ?></h4>
                                                  <p class="card-text text-truncate"><?php echo $data['detail'];  ?></p>
                                                  <p class="card-text text-harga">Rp <?php echo $data['harga'];  ?></p>
                                                  <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn warna1 text-white">Lihat Detail</a>
                                        </div>
                              </div>
                         </div>
                         <?php } ?>     
                    </div>
               
               <!-- See More -->
                         <a class="btn btn-outline-dark mt-4 p-2" href="produk.php">See More</a>
               <!-- End See More -->
          
          </div>
     </div>
     <!-- End Produk -->

     <!-- Iklan -->

     <!-- End Iklan -->

     <!-- Footer -->
          <?php require "footer.php" ?>
     <!-- End Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
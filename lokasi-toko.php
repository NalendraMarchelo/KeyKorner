<?php
     session_start();
     require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Toko Online | Lokasi Toko</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css" />
    <style>

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

<!--Lokasi Toko -->
<div class="container-fluid py-5">
          <div class="container text-center mt-3">
               <div class="row">
                    <!-- Breadcrumps -->
                              <nav aria-label="breadcrumb">
                                   <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">
                                             <a href="index.php" class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home </a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                             Lokasi Toko
                                        </li>
                                   </ol>
                              </nav>
                         <!-- End Breadcrumps -->
               </div>
               <h2 class="mt-3">Lokasi Toko</h2>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d830.6868153850274!2d112.61419699412043!3d-7.953951037385258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7882798fa4af0b%3A0x96b1403133d3c715!2sGedung%20F%20Fakultas%20Ilmu%20Komputer%20UB!5e0!3m2!1sid!2sid!4v1716570885846!5m2!1sid!2sid" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
     </div>
     <!-- End Lokasi Toko -->     

     <!-- Footer -->
          <?php require "footer.php" ?>
     <!-- End Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
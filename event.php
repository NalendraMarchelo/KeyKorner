<?php
     session_start();
     require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Toko Online | Lokasi Service Center</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="css/style.css" />
     <style>
        .event-image {
          height: 100%;
          width: 100%;
          object-fit: cover;
          object-position: center;
        }
        body {
          min-height: 100vh;
          display: flex;
          flex-direction: column;
        }
        .container-fluid {
          flex: 1;
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

     <!-- Lokasi Service Center -->
<div class="container-fluid py-5">
    <div class="container mt-3">
        <!-- Breadcrumbs -->
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php" class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Event dan Promo
                    </li>
                </ol>
            </nav>
        </div>
        <!-- End Breadcrumbs -->

        <h3 class="text-center mt-3 mb-3">Highlight Event</h3>
        <div class="row text-center">

            <!-- Paling kiri -->
            <div class="col-md-4 col-sm-6 mb-4">
               <a href="https://filkom.ub.ac.id/2024/05/20/filkom-ub-gelar-pembekalan-bagi-mahasiswa-penerima-beasiswa-apbn-2024/">
                    <img src="image/filkom_acara1.png" class="img-fluid  event-image" alt="">
               </a>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
               <a href="https://filkom.ub.ac.id/2024/05/06/iro-filkom-ub-adakan-workshop-worldquant-brains-2024/">
                    <img src="image/filkom_acara4.png" class="img-fluid  event-image" alt="">
               </a>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
               <a href="https://filkom.ub.ac.id/2024/05/11/filkom-ub-jadi-pembicara-di-laboratorium-yagi-dan-osaka-university/">
                    <img src="image/filkom_acara2.png" class="img-fluid  event-image" alt="">
               </a>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
               <a href="https://filkom.ub.ac.id/2024/05/11/filkom-ub-prodi-pendidikan-teknologi-informasi-adakan-workshop-implementasi-obe-pada-siado/">
                    <img src="image/filkom_acara3.png" class="img-fluid  event-image" alt="">
               </a>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
               <a href="https://filkom.ub.ac.id/2024/05/03/departemen-teknik-informatika-filkom-ub-jajaki-peluang-kerjasama-riset-dengan-soi-asia/">
                    <img src="image/filkom_acara5.png" class="img-fluid  event-image" alt="">
               </a>
            </div>

        </div>
    </div>
</div>
<!-- End Lokasi Service Center -->

     <!-- Footer -->
          <?php require "footer.php" ?>
     <!-- End Footer -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

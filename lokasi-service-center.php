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
          .location-item dt {
               margin-top: 25px; /* Adjust the value as needed */
               }
          .location-item dd {
               margin-bottom: 25px; /* Adjust the value as needed */
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
                        Lokasi Service Center
                    </li>
                </ol>
            </nav>
        </div>
        <!-- End Breadcrumbs -->

        <h2 class="text-center mt-3 mb-3">Lokasi Service Center</h2>
        
        <div class="row text-center">
            <!-- Malang -->
            <div class="col-md-4">
                <h4 class="mt-3">Malang</h4>
                <dl class="location-item">
                    <dt>Malang Town Square</dt>
                    <dd>Jl. Veteran No.2, Malang</dd>
                    <dt>Transmart MX Mall</dt>
                    <dd>Jl. Veteran No.8, Malang</dd>
                    <dt>Malang City Point</dt>
                    <dd>Jl. Mertojoyo Blok B, Malang</dd>
                    <dt>Olympic Garden Mall</dt>
                    <dd>Jl. Kawi No.24, Malang</dd>
                </dl>
            </div>

            <!-- Jakarta -->
            <div class="col-md-4">
                <h4 class="mt-3">Jakarta</h4>
                <dl class="location-item">
                    <dt>Pantai Indah Kapuk</dt>
                    <dd>Lantai 3 no 10</dd>
                    <dt>Plaza Senayan</dt>
                    <dd>Jl. Asia Afrika No.8, Jakarta</dd>
                    <dt>Grand Indonesia</dt>
                    <dd>Jl. M.H. Thamrin No.1, Jakarta</dd>
                    <dt>Kota Kasablanka</dt>
                    <dd>Jl. Casablanca Raya Kav.88, Jakarta</dd>
                    <dt>Pondok Indah Mall</dt>
                    <dd>Jl. Metro Pondok Indah, Jakarta</dd>
                    <dt>Central Park Mall</dt>
                    <dd>Jl. Letjen S. Parman No.28, Jakarta</dd>
                    <dt>Plaza Indonesia</dt>
                    <dd>Jl. M.H. Thamrin Kav.28-30, Jakarta</dd>
                    <dt>Gandaria City</dt>
                    <dd>Jl. Sultan Iskandar Muda, Jakarta</dd>
                </dl>
            </div>

            <!-- Bandung -->
            <div class="col-md-4">
                <h4 class="mt-3">Bandung</h4>
                <dl class="location-item">
                    <dt>Trans Studio Mall</dt>
                    <dd>Jl. Gatot Subroto No.289, Bandung</dd>
                    <dt>Paris Van Java</dt>
                    <dd>Jl. Sukajadi No.137-139, Bandung</dd>
                    <dt>Cihampelas Walk</dt>
                    <dd>Jl. Cihampelas No.160, Bandung</dd>
                    <dt>Festival Citylink</dt>
                    <dd>Jl. Peta No.241, Bandung</dd>
                    <dt>Bandung Indah Plaza</dt>
                    <dd>Jl. Merdeka No.56, Bandung</dd>
                    <dt>23 Paskal Shopping Center</dt>
                    <dd>Jl. Pasir Kaliki No.25-27, Bandung</dd>
                </dl>
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

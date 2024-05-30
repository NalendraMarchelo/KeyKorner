<?php
     session_start();
     require "koneksi.php";

     // Check if the connection is established
     if (!$con) {
     die("Connection failed: " . mysqli_connect_error());
     }

     // Check if the user is logged in
     checkLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Toko Online | Payment</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="css/style.css" />
     <style>
          body, html {
               height: 100%;
               margin: 0;
          }
          .bg {
               background-image: url('image/under_maintenance.jpg');
               height: 100%;
               background-position: center;
               background-repeat: no-repeat;
               background-size: cover;
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

     <!-- Gambar -->
     <div class="bg"></div>
     <!-- End Gambar -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

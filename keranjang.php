<?php
     session_start();
     require "koneksi.php";

     // Check if the connection is established
     if (!$con) {
     die("Connection failed: " . mysqli_connect_error());
     }

     // Check if the user is logged in
     checkLogin();

     $queryKeranjang = mysqli_query($con, "SELECT * FROM keranjang");
     $jumlahKeranjang = mysqli_num_rows($queryKeranjang);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Toko Online | Keranjang</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="css/style.css" />
     <style>
          body {
               display: flex;
               flex-direction: column;
               min-height: 100vh;
          }
          .cart-container {
               max-width: 800px;
               margin: auto;
               padding: 20px;
               background-color: #f8f9fa;
               border-radius: 10px;
               box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
               flex: 1;
          }
          .cart-item {
               display: flex;
               justify-content: space-between;
               align-items: center;
               margin-bottom: 20px;
               padding: 15px;
               border: 1px solid #dee2e6;
               border-radius: 10px;
               background-color: #fff;
          }
          .cart-item img {
               width: 80px;
               height: 80px;
               object-fit: cover;  
          }
          .cart-item-details {
               flex: 1;
               margin-left: 20px;
          }
          .cart-total {
               font-size: 1.5rem;
               font-weight: bold;
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

     <!-- Keranjang -->
     <div class="container cart-container mt-5 mb-5">
          <h2 class="text-center mb-4">Keranjang Belanja</h2>
          <!-- Sample cart item, will be replaced with a loop fetching from database -->
                    
                    <div class="cart-item">
                         <img src="image/euis-ergo.jpg" alt="">
                         <div class="cart-item-details">
                              <h5 class="mb-1">Euis Ergo Kit</h5>
                              <p class="mb-1">Jumlah: 1</p>
                         </div>
                         <div class="d-flex flex-column">
                                   <p class="mb-1">Harga: Rp899,999</p>
                         </div>
                    </div>
                    <div class="cart-item">
                         <img src="image/keycaps-2.png" alt="">
                         <div class="cart-item-details">
                              <h5 class="mb-1">GMK Mizu</h5>
                              <p class="mb-1">Jumlah: 1</p>
                         </div>
                         <div class="d-flex flex-column">
                                   <p class="mb-1">Harga: Rp390,000</p>
                         </div>
                    </div>
                    <div class="cart-item">
                         <img src="image/ajazz-ak820.png" alt="">
                         <div class="cart-item-details">
                              <h5 class="mb-1">Ajazz AK820 GTS</h5>
                              <p class="mb-1">Jumlah: 1</p>
                         </div>
                         <div class="d-flex flex-column">
                                   <p class="mb-1">Harga: Rp879,000</p>
                         </div>
                    </div>
                    <div class="cart-item">
                         <img src="image/switch-5.jpg" alt="">
                         <div class="cart-item-details">
                              <h5 class="mb-1">Zifriend ZA68 PRO</h5>
                              <p class="mb-1">Jumlah: 1</p>
                         </div>
                         <div class="d-flex flex-column">
                                   <p class="mb-1">Harga: Rp44,500</p>
                         </div>
                    </div>
                    <div class="cart-item">
                         <img src="image/zifriend-za68.png" alt="">
                         <div class="cart-item-details">
                              <h5 class="mb-1">Zifriend ZA68 PRO</h5>
                              <p class="mb-1">Jumlah: 1</p>
                         </div>
                         <div class="d-flex flex-column">
                                   <p class="mb-1">Harga: Rp549,000</p>
                         </div>
                    </div>
                    
                    <!-- End isi keranjang -->

          <div class="text-end mt-4 cart-total">
               Total: Rp2,762,499
          </div>
          <div class="text-end mt-2">
               <form id="checkoutForm" action="payment.php" method="post">
                    <button type="submit" class="btn btn-success">Lanjut ke Pembayaran</button>
               </form>
          </div>
     </div>
     <!-- End Keranjang -->

     <!-- Footer -->
          <?php require "footer.php"; ?>
     <!-- End Footer -->     
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<?php
require "session.php";
require "../koneksi.php";

$id= $_GET['id'];

$query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Detail Kategori</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dI+uDoYrk8PSfG7RE+ovE+CE3rhPi8GJ5y1b9o+hlGaaS/FGT/W4mSbYk4/06Xk2bD6wAcXwhlK2VfF5aq/lKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <style>

     </style>
</head>


<body>
     <?php require "navbar.php"; ?>
     <div class="container mt-5">
          <h2>Detail Kategori</h2>

          <div class="col-12 col-md-6">
               <form action="" method="post">
                    <div>
                         <label for="kategori">Kategori</label>
                         <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo $data['nama'];  ?>">
                    </div>

                    <div class="mt-5">
                         <button type="submit" class ="btn btn-primary" name="editBtn">Edit</button>
                         <button type="submit" class ="btn btn-danger" name="deleteBtn">Delete</button>
                    </div>
               </form>

               <?php
               if(isset($_POST['editBtn'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    if($data['nama']==$kategori){
                         ?>
                         <meta http-equiv="refresh" content="0; url=kategori.php" />
                         <?php
                    }
                    else {
                         $query= mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
                         $jumlahData = mysqli_num_rows($query);
                         
                         if($jumlahData > 0 ){
                              ?>
                              <div class="alert alert-warning mt-3" role="alert">
                                   Kategori Sudah Ada!
                              </div>
                              <?php
                         }
                         else{
                              $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");
                              if($querySimpan){
                                   ?>
                                   <div class="alert alert-success mt-3" role="alert">
                                        Kategori Berhasil Diubah
                                   </div>
                                   <meta http-equiv="refresh" content="1; url=kategori.php" />
                                   <?php

                              }
                              else {
                                   echo mysqli_error($con);
                              }
                         }
                    }
               }
               
               if (isset($_POST['deleteBtn'])){
                    $queryCheck = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$id'");
                    $dataCount = mysqli_num_rows($queryCheck);

                    if($dataCount > 0){
       ?>
                         <div class="alert alert-warning mt-3" role="alert">
                               Kategori Tidak Bisa Dihapus, Terdapat Produk di Dalam Kategori
                         </div>
      <?php
                         die();
                    }

                    $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");
                   
                    if($queryDelete){
                         ?>
                         <div class="alert alert-primary mt-3" role="alert">
                               Kategori Berhasil Dihapus
                         </div>
                         <meta http-equiv="refresh" content="1; url=kategori.php" />
                         <?php    
                    }
                    else{
                         echo mysqli_error($con);
                    }
               }
               ?>
          </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
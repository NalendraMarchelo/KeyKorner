<?php
require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Kategori</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dI+uDoYrk8PSfG7RE+ovE+CE3rhPi8GJ5y1b9o+hlGaaS/FGT/W4mSbYk4/06Xk2bD6wAcXwhlK2VfF5aq/lKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.no-decoration {
     text-decoration: none;
}
</style>
</head>
<body>
     <?php require "navbar.php";?>
     <div class="container mt-5">
          <!-- Breadcrumps -->
          <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                         <a href="../adminpanel" class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                         Kategori
                    </li>
                </ol>
          </nav>
          <!-- End Breadcrumps -->
          <div class="my-5 col-12 col-md-6">
               <h3>Tambah Kategori</h3>
               <form action="" method="post">
                    <div>
                         <label for="kategori">Kategori</label>
                         <input type="text" id="kategori" name="kategori" placeholder="input nama kategori" class="form-control" autocomplete=off required>
                    </div>
                    <div class="mt-3">
                         <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                    </div>
               </form>
               <?php
                    if (isset($_POST['simpan_kategori'])){
                         $kategori=htmlspecialchars($_POST['kategori']);

                         $queryExist= mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
                         $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);
                         
                         if($jumlahDataKategoriBaru>0){
                              ?>
                              <div class="alert alert-warning mt-3" role="alert">
                                   Kategori Sudah Ada!
                              </div>
                              <?php
                         }
                         else{
                              $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                              if($querySimpan){
                                   ?>
                                   <div class="alert alert-success mt-3" role="alert">
                                        Kategori Berhasil Tersimpan
                                   </div>
                                   <meta http-equiv="refresh" content="1; url=kategori.php" />
                                   <?php

                              }
                              else {
                                   echo mysqli_error($con);
                              }
                         }
                    }
               ?>
               
          </div>


          <div class="mt-3">
               <h2>
                    List Kategori
               </h2>
               <div class="table-responsive mt-3">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th>No.</th>
                                   <th>Nama</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                              if ($jumlahKategori == 0) {
                                   echo '<tr><td colspan="3" class="text-center">Tidak ada data kategori</td></tr>';
                              } else {
                                   $number = 1;
                                   while ($data = mysqli_fetch_array($queryKategori)) {
                              ?>
                                        <tr>
                                             <td><?php echo $number++; ?></td>
                                             <td><?php echo htmlspecialchars($data['nama']); ?></td>
                                             <td>
                                                  <a href="kategori-detail.php?id=<?php echo $data['id'];  ?> " class=" btn btn-info"><i class=" fas fa-search"></i></a>
                                             </td>
                                        </tr>
                              <?php
                                   }
                              }
                              ?>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

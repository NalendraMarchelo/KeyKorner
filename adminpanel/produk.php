<?php
require "session.php";
require "../koneksi.php";

$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
$jumlahProduk = mysqli_num_rows($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

//rename file
function generateRandomString($length = 10) {
     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $charactersLength = strlen($characters);
     $randomString = '';
     for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[random_int(0, $charactersLength - 1)];
     }
     return $randomString;
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Produk</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dI+uDoYrk8PSfG7RE+ovE+CE3rhPi8GJ5y1b9o+hlGaaS/FGT/W4mSbYk4/06Xk2bD6wAcXwhlK2VfF5aq/lKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <style>
.no-decoration {
     text-decoration: none;
}

form div{
     margin-bottom: 10px;
}
     </style>
</head>
<body>
     <?php require "navbar.php"; ?>
     <div class="container mt-5"> 
          <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item active" aria-current="page">
                              <a href="../adminpanel" class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home </a>
                         </li>
                         <li class="breadcrumb-item active" aria-current="page">
                              Produk
                         </li>
                    </ol>
          </nav>

          <!-- tambah produk -->
          <div class="my-5 col-12 col-md-6">
               <h3>Tambah Produk</h3>
               <form action="" method="post" enctype="multipart/form-data">
                    
               <!-- Nama -->
                    <div>
                         <label for="nama">Nama</label>
                         <input type="text" id="nama" name="nama" class="form-control" autocomplete=off required>
                    </div>

                    <!-- Kategori -->
                    <div>
                         <label for="kategori">Kategori</label>
                         <select name="kategori" id="kategori" class="form-control">
                              <option value="">Pilih kategori</option>
           <?php
                              while($data=mysqli_fetch_array($queryKategori)){
           ?>
                              <option value="<?php  echo $data['id']; ?>"> <?php  echo $data ['nama']; ?></option>
           <?php                        
                              }
           ?>                 
                         </select>
                    </div>

                    <!-- Harga -->
                    <div>
                         <label for="harga">Harga</label>
                         <input type="number" class="form-control" name="harga" required>
                    </div>

                    <!-- Foto -->
                    <div>
                         <label for="foto">Upload Foto</label>
                         <input type="file" name="foto" id="foto" class="form-control">
                    </div>


                    <!-- Detail -->
                    <div>
                         <label for="detail">Detail</label>
                         <textarea name="detail" id="detail"  cols="30" rows="10" class="form-control"></textarea>
                    </div>


                    <!-- Ketersediaan stok -->
                    <div>
                         <label for="ketersediaan_stok">Ketersediaan Stok</label>
                         <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                              <option value="tersedia">tersedia</option>
                              <option value="habis">habis</option>
                         </select>
                    </div>

                    <!-- Button submit -->
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

               </form>
               
           <?php 
                    if(isset($_POST['simpan'])){
                         $nama = htmlspecialchars($_POST['nama']);
                         $kategori = htmlspecialchars($_POST['kategori']);
                         $harga = htmlspecialchars($_POST['harga']);
                         $detail = htmlspecialchars($_POST['detail']);
                         $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                         // foto
                         $target_dir = "../image/";
                         $nama_file = basename($_FILES["foto"]["name"]);
                         $target_file = $target_dir . $nama_file;
                         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                         $image_size = $_FILES["foto"]["size"];
                         $random_name = generateRandomString(20);
                         $new_name = $random_name . "." . $imageFileType;

                         if($nama=='' || $kategori=='' || $harga==''){
           ?>
                              <div class="alert alert-warning mt-3" role="alert">
                                   Wajib Diisi!
                              </div>
           <?php                   
                         }
                         else {
                              if($nama_file !=''){
                                   // nanti ubah file size nya
                                   if($image_size > 500000000){
           ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                                  File Terlalu Besar! (max 500 Kb)
                                        </div>
           <?php                             
                                   }
                                   else{
                                        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif'){
           ?>
                                             <div class="alert alert-warning mt-3" role="alert">
                                                       Ekstensi Tidak Mendukung! (jpg, png, gif)
                                             </div>
           <?php                                  
                                        }
                                        else{
                                             move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                                        }
                                   }
                              }

                              // query insert to produk table
                              $queryTambah = mysqli_query($con, "INSERT INTO produk (kategori_id, nama, harga, foto, detail, ketersediaan_stok) VALUES ('$kategori', '$nama', '$harga', '$new_name.', '$detail', '$ketersediaan_stok')");

                              if($queryTambah){
           ?>
                                   <div class="alert alert-success mt-3" role="alert">
                                        Produk Berhasil Tersimpan
                                   </div>
                                   <meta http-equiv="refresh" content="1; url=produk.php" />
           <?php
                              }
                              else{
                                   echo mysqli_error($con);
                              }
                         }
                    }
           ?>    
          </div>


          <div class="mt-3 mb-7"></div>
               <h2>List Produk</h2>
               <div class="table-responsive mt-3">
                    <table class="table">
                         <thead>
                              <tr>
                                   <th>No.</th>
                                   <th>Nama</th>
                                   <th>Kategori</th>
                                   <th>Harga</th>
                                   <th>Ketersediaan Stok</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
          <?php 
                                   if ($jumlahProduk==0){
          ?>
                               <tr>
                                   <td colspan="6" class="text-center">Tidak ada data produk</td>
                              </tr>
          <?php         
                                   }
                                   else {
                                        $jumlah = 1;
                                        while($data=mysqli_fetch_array($query)){
          ?>
                                             <tr>
                                                  <td><?php echo $jumlah; ?></td>
                                                  <td><?php echo $data['nama']; ?></td>
                                                  <td><?php echo $data['nama_kategori']; ?></td>
                                                  <td><?php echo $data['harga']; ?></td>
                                                  <td><?php echo $data['ketersediaan_stok']; ?></td>
                                                  <td>
                                                       <a href="produk-detail.php?id=<?php echo $data['id'];  ?> " class=" btn btn-info"><i class=" fas fa-search"></i></a>
                                                  </td>
                                             </tr>
          <?php
                                             $jumlah++;
                                        }
                                   }
                              ?>
                         </tbody>
                    </table>
               </div>
     </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
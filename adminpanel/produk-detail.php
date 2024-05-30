<?php
require "../koneksi.php";

$id= $_GET['id'];

$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
$data = mysqli_fetch_array($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id != '$data[kategori_id]'");

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
     <title>Produk Detail</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dI+uDoYrk8PSfG7RE+ovE+CE3rhPi8GJ5y1b9o+hlGaaS/FGT/W4mSbYk4/06Xk2bD6wAcXwhlK2VfF5aq/lKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
form div{
     margin-bottom: 10px;
}


</style>
</head>

<body>
     <?php require "navbar.php"; ?>

     <div class="container mt-5">
          <h2>Detail Produk</h2>
          <div class="col-12 col-md-6 mb-5">
               <form action="" method="post" enctype="multipart/form-data">
                              <!-- Nama -->
                              <div>
                                   <label for="nama">Nama</label>
                                   <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" autocomplete=off>
                              </div>

                         <!-- Kategori -->
                              <div>
                                   <label for="kategori">Kategori</label>
                                   <select name="kategori" id="kategori" class="form-control">
                                        <option value=""><?php  echo $data['nama_kategori']; ?></option>
<?php
                                        while($dataKategori=mysqli_fetch_array($queryKategori)){
?>
                                        <option value="<?php  echo $dataKategori['id']; ?>"> <?php  echo $dataKategori ['nama']; ?></option>
<?php                        
                                        }
?>                 
                                   </select>
                              </div>

                         <!-- Harga -->
                              <div>
                                   <label for="harga">Harga</label>
                                   <input type="number" class="form-control" value ="<?php  echo $data['harga']; ?>" name="harga">
                              </div>

                         <!-- Foto -->
                         <div>
                              <label for="currentFoto">Foto Produk Sekarang</label>
                              <img src="../image/<?php  echo $data['foto']; ?>" alt="" width="300px">
                         </div>
                              <div>
                                   <label for="foto">Upload Foto</label>
                                   <input type="file" name="foto" id="foto" class="form-control">
                              </div>

                          <!-- Detail -->
                              <div>
                                   <label for="detail">Detail</label>
                                   <textarea name="detail" id="detail"  cols="30" rows="10" class="form-control">
                                        <?php echo $data['detail'];  ?>
                                   </textarea>
                              </div> 
                              
                          <!-- Ketersediaan stok -->
                              <div>
                                   <label for="ketersediaan_stok">Ketersediaan Stok</label>
                                   <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                                        <option value="<?php echo $data['ketersediaan_stok']; ?>"><?php echo $data['ketersediaan_stok']; ?></option>
<?php
                                        if($data['ketersediaan_stok']=='tersedia'){
?>
                                                  <option value="habis">habis</option>
<?php
                                        }
                                        else{
?>
                                                  <option value="tersedia">tersedia</option>
<?php
                                        }
?>
                                   </select>
                              </div>

                         <!-- Button submit/delete -->
                              <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                              <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>

               <form>

               <!-- Cek Tombol disubmit -->
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
                     
                         // Periksa apakah hanya foto yang diunggah
                         if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0){
                             // Jika foto diunggah, proses update foto
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
                              
                                                                           $queryUpdate = mysqli_query($con, "UPDATE produk SET foto='$new_name' WHERE id='$id'");
                              
                                                                           if($queryUpdate){
                              ?>
                                                                                     <div class="alert alert-success mt-3" role="alert">
                                                                                          Produk Berhasil Diupdate
                                                                                     </div>
                                                                                     <meta http-equiv="refresh" content="1; url=produk.php" />
                              <?php
                                                                           }
                                                                           else{
                                                                                echo mysqli_error($con);
                                                                           }
                                                                      }
                                                                 }
                         } else {


                              // !!***PADA BAGIAN BAWAH INI  BELUM SEMPURNA, PENGEDITAN DATA HARUS TIGA-TIGANYA, JIKA TIDAK MAKA TIDAK BISA UPDATE DATA***!!//
                             // Jika tidak ada foto yang diunggah, periksa apakah nama, kategori, dan harga telah diisi
                             if($nama == '' || $kategori == '' || $harga == ''){
                     ?>
                                 <div class="alert alert-warning mt-3" role="alert">
                                     Nama, Kategori, dan Harga Wajib Diisi!
                                 </div>
                     <?php
                             } else {
                                 // Jika nama, kategori, dan harga telah diisi, proses update tanpa mengubah foto
                                 $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori', nama='$nama', harga='$harga', detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id='$id'");
                                 ?>
                                 <div class="alert alert-success mt-3" role="alert">
                                      Produk Berhasil Diubah
                                 </div>
                                 <meta http-equiv="refresh" content="1; url=produk.php" />
                                 <?php
                                 
                             }
                         }
                     }
                     // !!***PADA BAGIAN ATAS INI  BELUM SEMPURNA, PENGEDITAN DATA HARUS TIGA-TIGANYA, JIKA TIDAK MAKA TIDAK BISA UPDATE DATA***!!//
                     
                     
                     if(isset($_POST['hapus'])){
                         $queryHapus = mysqli_query($con, "DELETE FROM produk WHERE id='$id'");
                     
                         if($queryHapus){
                     ?>
                             <div class="alert alert-primary mt-3" role="alert">
                                 Produk Berhasil Dihapus
                             </div>
                             <meta http-equiv="refresh" content="1; url=produk.php" />
                     <?php
                         }
                     }
?>
          </div>
     </div>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
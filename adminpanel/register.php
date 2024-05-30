<?php
session_start();
require "../koneksi.php";

// Check if the connection is established
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to register a new user
function registrasi($data) {
    global $con;

    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($con, $data["password"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);

    // Check if username already exists
    $result = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        // Username already registered
        echo "<div class='alert alert-warning mt-3' role='alert'>Username sudah terdaftar</div>";
        return false;
    }

    // Check password confirmation
    if ($password !== $password2) {
        // Password confirmation does not match
        echo "<div class='alert alert-warning mt-3' role='alert'>Konfirmasi password tidak sesuai</div>";
        return false;
    }

    // Encrypt the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Add user to the database
    mysqli_query($con, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'client')");
    return mysqli_affected_rows($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Register</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
     <link rel="stylesheet" href="css/style.css" />
</head>
<style>
     .main {
          height: 100vh;
     }
     .login-box {
          width: 500px;
          box-sizing: border-box;
          border-radius: 10px;
     }

     .no-decoration {
          text-decoration: none;
          color: rgb(100, 100, 100);
     }

     .no-decoration:hover {
          color: black;
     }
</style>
<body>
     <div class="main d-flex flex-column justify-content-center align-items-center">
          <div class="login-box p-5 shadow">
               <form action="" method="post">
                    <div class="">
                         <label for="username">Username</label>
                         <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div>
                         <label for="password">Password</label>
                         <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div>
                         <label for="password2">Konfirmasi Password</label>
                         <input type="password" class="form-control" name="password2" id="password2" autocomplete="off" required>
                    </div>
                    <div>
                         <button class="btn btn-success form-control mt-3" type="submit" name="registerbtn">
                              Register
                         </button>
                    </div>
                    <?php
                         if (isset($_POST['registerbtn'])) {
                              if (registrasi($_POST) > 0) {
                                   echo "<div class='alert alert-success mt-3' role='alert'>Registrasi berhasil</div>";
                                   echo '<meta http-equiv="refresh" content="1;url=login.php" />';
                              } else {
                                   echo "<div class='alert alert-danger mt-3' role='alert'>Registrasi gagal</div>";
                              }
                         }
                    ?>
                    <div class="text-center mt-3">
                         <a class="no-decoration" href="login.php">Sudah punya akun? Klik disini</a>
                    </div>
               </form>
          </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

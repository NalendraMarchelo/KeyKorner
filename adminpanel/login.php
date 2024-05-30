<?php
session_start();
require "../koneksi.php";

// Check if the connection is established
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete=off required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete=off required>
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">
                        Login
                    </button>
                </div>
                <?php
                if (isset($_POST['loginbtn'])) {
                    $username = htmlspecialchars(trim($_POST['username']));
                    $password = htmlspecialchars(trim($_POST['password']));

                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);

                    if ($countdata > 0) {
                        if (password_verify($password, $data['password'])) {
                            $_SESSION['user_id'] = $data['id']; // Store user ID in session
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['role'] = $data['role'];
                            $_SESSION['login'] = true;

                            if ($data['role'] == 'admin') {
                                header('Location: index.php'); // Redirect to admin page
                            } else {
                                header('Location: ../keranjang.php'); // Redirect to client page
                            }
                            exit;
                        } else {
                            echo "<div class='alert alert-warning mt-3' role='alert'>Password salah</div>";
                        }
                    } else {
                        echo "<div class='alert alert-warning mt-3' role='alert'>Akun tidak tersedia</div>";
                    }
                }
                ?>
                <div class="text-center mt-3">
                    <a class="no-decoration" href="register.php">Belum punya akun? Klik disini</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

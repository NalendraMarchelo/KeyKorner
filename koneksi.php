<?php
$host = "localhost"; // or your database host
$user = "root";
$password = "";
$database = "toko_online";

$con = mysqli_connect($host, $user, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Cek login untuk keranjang
function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: adminpanel/login.php");
        exit();
    }
}
?>

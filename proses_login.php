
<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['login'] = true;
    header("Location: dashboard.php");
} else {
    header("Location: login.php");
    exit;
}
?>
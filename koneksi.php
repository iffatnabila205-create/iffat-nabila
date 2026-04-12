
<?php
$conn = mysqli_connect("localhost", "root", "", "ta_webprolagi");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
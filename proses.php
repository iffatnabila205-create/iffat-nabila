
<?php
include 'koneksi.php';

// SIMPAN (CREATE + UPDATE + UPLOAD)
if (isset($_POST['simpan'])) {

    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];

    move_uploaded_file($tmp, "upload/" . $file);

    if ($id == "") {
        // CREATE
        mysqli_query($conn, "INSERT INTO data VALUES(NULL,'$nama','$file')");
    } else {
        // UPDATE
        mysqli_query($conn, "UPDATE data SET nama='$nama', file='$file' WHERE id='$id'");
    }

    header("Location: dashboard.php");
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM data WHERE id='$id'");
    header("Location: dashboard.php");
}
?>
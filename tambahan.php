<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link rel="stylesheet" href="login.css">

    <!-- Font & Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="login-container">

    <!-- KIRI (GAMBAR) -->
    <div class="login-image">
        <div class="overlay">
            <h1>TAMBAHAN</h1>
            <p>Kelola Data & Upload File</p>
        </div>
    </div>

    <!-- KANAN (CRUD) -->
    <div class="login-form">

        <h2>CRUD + Upload</h2>
        <p>Tambah dan kelola data</p>

        <!-- FORM -->
        <form action="proses.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="">

            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="nama" placeholder="Nama" required>
            </div>

            <div class="input-group">
                <i class="fa fa-file"></i>
                <input type="file" name="file" required>
            </div>

            <button type="submit" name="simpan">Simpan</button>
        </form>

        <!-- TABEL -->
        <div style="margin-top:20px; max-height:150px; overflow:auto;">
            <table style="width:100%; font-size:13px; border-collapse:collapse;">
                <tr style="background:#0f9b8e; color:white;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM data");

                if ($data) {
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr style="text-align:center; border-bottom:1px solid #ddd;">
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama']; ?></td>
                    <td>
                        <a href="upload/<?= $d['file']; ?>" target="_blank">Lihat</a>
                    </td>
                    <td>
                        <a href="dashboard.php?edit=<?= $d['id']; ?>">Edit</a> |
                        <a href="proses.php?hapus=<?= $d['id']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
                }
                ?>
            </table>
        </div>

        <!-- LOGOUT -->
        <div class="register">
            <a href="logout.php">Logout</a>
        </div>

    </div>

</div>

</body>
</html>
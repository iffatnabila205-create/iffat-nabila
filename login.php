<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="login.css">

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Icon (optional biar bagus) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="login-container">

    <!-- KIRI (GAMBAR) -->
    <div class="login-image">
        <div class="overlay">
            <h1>WELCOME</h1>
            <p>Silakan login untuk melanjutkan</p>
        </div>
    </div>

    <!-- KANAN (FORM) -->
    <div class="login-form">

        <h2>Login</h2>
        <p>Masukkan username & password</p>

        <form action="proses_login.php" method="POST">

            <!-- USERNAME -->
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <!-- PASSWORD -->
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <!-- OPSI -->
            <div class="options">
                <label><input type="checkbox"> Remember</label>
                <a href="#">Lupa password?</a>
            </div>

            <!-- BUTTON -->
            <button type="submit">Login</button>

        </form>

        <!-- REGISTER -->
        <div class="register">
            <p>Belum punya akun? <a href="#">Daftar</a></p>
        </div>

    </div>

</div>

</body>
</html>
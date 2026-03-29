<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

$error_message = '';
$success_message = '';
$show_form = true;

$dummy_users = [
    'admin' => true,
    'user1' => true,
    'tourist' => true
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validasi
    $errors = [];
    
    if (strlen($username) < 3) {
        $errors[] = 'Username minimal 3 karakter';
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email tidak valid';
    }
    
    if (strlen($password) < 6) {
        $errors[] = 'Password minimal 6 karakter';
    }
    
    if ($password !== $confirm_password) {
        $errors[] = 'Konfirmasi password tidak cocok';
    }
    
    if (isset($dummy_users[$username])) {
        $errors[] = 'Username sudah terdaftar';
    }
    
    if (empty($errors)) {
        // Simpan user baru (dummy - ganti dengan database)
        $dummy_users[$username] = password_hash($password, PASSWORD_DEFAULT);
        $success_message = 'Registrasi berhasil! Silakan login.';
        $show_form = false;
    } else {
        $error_message = implode('<br>', $errors);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrasi | TOUGAR</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="register-page">
  <div class="auth-container">
    <div class="auth-card">
      <div class="auth-header">
        <img src="Logo.png" alt="TOUGAR Logo" class="logo">
        <h1>TOUGAR</h1>
        <p>Menjelajahi Keindahan Alam & Budaya Garut</p>
      </div>

      <?php if ($show_form): ?>
      <form method="POST" class="auth-form">
        <div class="input-group">
          <i class="fas fa-user"></i>
          <input type="text" name="username" placeholder="Username" required minlength="3">
        </div>

        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required minlength="6">
        </div>

        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
        </div>

        <?php if ($error_message): ?>
        <div class="alert alert-error">
          <i class="fas fa-exclamation-circle"></i>
          <?php echo $error_message; ?>
        </div>
        <?php endif; ?>

        <button type="submit" class="btn-primary">
          <span>Daftar</span>
          <i class="fas fa-user-plus"></i>
        </button>
      </form>

      <div class="auth-footer">
        <p>Sudah punya akun? <a href="index.php">Login sekarang</a></p>
      </div>
      <?php else: ?>
      <div class="success-message">
        <i class="fas fa-check-circle"></i>
        <h3><?php echo $success_message; ?></h3>
        <a href="index.php" class="btn-primary">Login Sekarang</a>
      </div>
      <?php endif; ?>
    </div>
  </div>

  <script src="auth.js"></script>
</body>
</html>

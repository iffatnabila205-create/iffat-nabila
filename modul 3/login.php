<?php
session_start();

// Inisialisasi variabel
$username = '';
$password = '';
$error_message = '';
$success_message = '';

// Proses login saat form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = isset($_POST['remember']);

    // Validasi sederhana (tanpa database)
    $is_valid_login = false;
    
    // Contoh data dummy untuk testing (ganti dengan query database nanti)
    $dummy_users = [
        'admin' => 'admin123',
        'user1' => 'password123',
        'tourist' => 'garut2024'
    ];

    if (isset($dummy_users[$username]) && $dummy_users[$username] === $password) {
        $is_valid_login = true;
    }

    if ($is_valid_login) {
        // Simpan session
        $_SESSION['user_id'] = $username;
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;

        // Jika "Ingat saya" dicentang, set cookie
        if ($remember) {
            $token = bin2hex(random_bytes(32));
            setcookie('remember_token', $token, time() + (30 * 24 * 60 * 60), '/', '', true, true);
            $_SESSION['remember_token'] = $token;
        }

        // Redirect ke dashboard (buat file dashboard.php nanti)
        header('Location: dashboard.php');
        exit();
    } else {
        $error_message = 'Username atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | TOUGAR</title>

  <!-- CSS -->
  <link rel="stylesheet" href="loginakun.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

  <div class="login-container">
    <!-- LEFT IMAGE -->
    <div class="login-image">
      <div class="overlay">
        <h1>TOUGAR</h1>
        <p>Menjelajahi Keindahan Alam & Budaya Garut</p>
      </div>
    </div>

    <!-- RIGHT FORM -->
    <div class="login-form">
      <img src="Logo.png" alt="TOUGAR Logo" class="logo">

      <h2>Login Akun</h2>
      <p>Silakan masuk untuk melanjutkan perjalanan wisata Anda</p>

      <?php if ($error_message): ?>
        <div class="alert alert-error">
          <i class="fas fa-exclamation-circle"></i>
          <?php echo htmlspecialchars($error_message); ?>
        </div>
      <?php endif; ?>

      <form method="POST" action="">
        <div class="input-group">
          <i class="fa fa-user"></i>
          <input 
            type="text" 
            name="username" 
            placeholder="Username" 
            value="<?php echo htmlspecialchars($username); ?>"
            required
          >
        </div>

        <div class="input-group">
          <i class="fa fa-lock"></i>
          <input 
            type="password" 
            name="password" 
            placeholder="Password" 
            required
          >
        </div>

        <div class="options">
          <label>
            <input type="checkbox" name="remember" <?php echo ($remember ?? '') ? 'checked' : ''; ?>>
            Ingat saya
          </label>
          <a href="forgot-password.php">Lupa password?</a>
        </div>

        <button type="submit" class="btn-login">
          <span>Masuk</span>
          <i class="fas fa-arrow-right"></i>
        </button>

        <p class="register">
          Belum punya akun? <a href="register.php">Daftar sekarang</a>
        </p>
      </form>
    </div>
  </div>

  <script>
    // Validasi client-side tambahan
    document.querySelector('form').addEventListener('submit', function(e) {
      const username = document.querySelector('input[name="username"]').value;
      const password = document.querySelector('input[name="password"]').value;
      
      if (username.length < 3) {
        e.preventDefault();
        alert('Username minimal 3 karakter!');
        return false;
      }
      
      if (password.length < 4) {
        e.preventDefault();
        alert('Password minimal 4 karakter!');
        return false;
      }
    });

    // Auto focus username
    document.querySelector('input[name="username"]').focus();
  </script>

</body>
</html>
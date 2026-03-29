<div class="auth-container">
  <div class="auth-card">
    <div class="auth-header">
      <img src="Logo.png" alt="TOUGAR Logo" class="logo">
      <h1>TOUGAR</h1>
      <p>Silakan masuk untuk melanjutkan perjalanan wisata Anda</p>
    </div>

    <?php if ($error_message): ?>
    <div class="alert alert-error">
      <i class="fas fa-exclamation-circle"></i>
      <?php echo $error_message; ?>
    </div>
    <?php endif; ?>

    <form method="POST" class="auth-form" id="loginForm">
      <input type="hidden" name="action" value="login">
      
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Username" required autocomplete="username">
      </div>

      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
      </div>

      <div class="form-options">
        <label class="checkbox-label">
          <input type="checkbox" name="remember">
          <span class="checkmark"></span>
          Ingat saya
        </label>
        <a href="forgot-password.php" class="forgot-link">Lupa password?</a>
      </div>

      <button type="submit" class="btn-primary">
        <span>Masuk</span>
        <i class="fas fa-sign-in-alt"></i>
      </button>
    </form>

    <div class="auth-footer">
      <p>Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
    </div>
  </div>
</div>

<script src="auth.js"></script>

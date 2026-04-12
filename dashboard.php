<?php 
session_start(); include 'koneksi.php'; 
if (!isset($_SESSION['login'])){ 
     header("Location: login.php"); 
    exit; 
} 
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TOUGAR | TOUR GARUT</title>

  <!-- CSS -->
  <link rel="stylesheet" href="dashboard.css">
</head>

<body>
  <a href="wishlist.html" class="floating-wishlist">
    ❤️ <span id="wishlist-count">0</span>
  </a>

  <!-- HEADER -->
  <header>
  <div class="logo">
    <img src="Logo.png" alt="Logo TOUGAR">
    <span>TOUGAR</span>
  </div>

  <div class="user-profile">
    <img src="WhatsApp Image 2025-12-22 at 12.49.23.jpeg" alt="User" class="user-avatar">
    <span class="username">Guest</span>
  </div>

  <h1>TOUGAR | TOUR GARUT</h1>
  <p>Menjelajahi Keindahan Alam & Budaya Garut</p>
</header>



  <!-- NAVIGATION -->
  <nav>
    <a href="TUBES.html">Beranda</a>
    <a href="destinasi.html">Destinasi</a>
    <a href="paketwisata.html">Paket Wisata</a>
    <a href="petawisata.html">Peta Wisata</a>
    <a href="laporan.html">Laporan</a>
    <a href="kontak.html">Kontak</a>
  </nav>

  <!-- SLIDER -->
  <section class="slider">
    <div class="slides">
      <img src="papandayan.jpeg" alt="Gunung Papandayan">
      <img src="cipanas.webp" alt="Kolam Renang Cipanas Garut">
      <img src="situ bagendit.jpg" alt="Situ Bagendit">
      <img src="santolo.webp" alt="Pantai Santolo Beach">
      <img src="kamojang.jpeg" alt="Kamojang">

      <!-- duplikat untuk infinite -->
      <img src="papandayan.jpeg">
      <img src="cipanas.webp">
      <img src="situ bagendit.jpg">
      <img src="santolo.webp">
      <img src="kamojang.jpeg">
    </div>
  </section>

  <!-- MAIN CONTENT -->
  <main>
    <article>
      <h2>TOUGAR | TOUR GARUT</h2>
      <img src="Logo.png" alt="TOUGAR">
      <p>
        Nikmati pengalaman tak terlupakan menjelajahi keindahan alam dan budaya khas Garut
        bersama <strong>TOUGAR | TOUR GARUT</strong>.
      </p>
      <p>
        Paket tour kami menghadirkan keseimbangan antara petualangan dan kenyamanan.
      </p>
      <p>
        <em>Lebih dekat, lebih hangat, dan lebih berkesan.</em>
      </p>
    </article>

    <aside>
      <h3>Destinasi Populer</h3>
      <ul>
        <li><a href="#">Kolam Renang Cipanas</a></li>
        <li><a href="#">Situ Bagendit</a></li>
        <li><a href="#">Pantai Santolo Beach</a></li>
        <li><a href="#">Kawah Kamojang</a></li>
        <li><a href="#">Gunung Papandayan</a></li>
      </ul>

      <h3>Info Wisata</h3>
      <ul>
        <li><a href="#">Tips Liburan di Garut</a></li>
        <li><a href="#">Kuliner Khas Garut</a></li>
        <li><a href="#">Rute dan Transportasi</a></li>
      </ul>
    </aside>
  </main>

  <!-- FOOTER -->
 
<!-- FOOTER -->
  <footer class="footer-dark">
  <div class="footer-container">

    <!-- LOGO -->
    <div class="footer-brand">
      <img src="Logo.png" alt="TOUGAR Logo">
      <p>TOUGAR | TOUR GARUT</p>
    </div>

    <!-- SITUS WEB KAMI -->
    <div class="footer-column">
      <h4>Menu</h4>
      <a href="TUBES.html">Beranda</a>
      <a href="destinasi.html">Destinasi</a>
      <a href="Paket wisata.html">Paket Wisata</a>
      <a href="kontak.html">Kontak</a>
    </div>

    <!-- INFORMASI -->
    <div class="footer-column">
      <h4>Informasi</h4>
      <a href="#">Tentang Kami</a>
      <a href="#">Kebijakan Privasi</a>
      <a href="#">Syarat & Ketentuan</a>
      <a href="#">Kebijakan Cookie</a>
      <a href="#">Hubungi Kami</a>
    </div>

    <!-- MEDIA SOSIAL -->
    <div class="footer-column">
      <h4>Media Sosial</h4>
      <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
      <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
      <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
      <a href="#"><i class="fab fa-youtube"></i> Youtube</a>
      <a href="#"><i class="fab fa-tiktok"></i> TikTok</a>
    </div>

  </div>

  <div class="footer-bottom">
    © 2025 TOUGAR | TOUR GARUT — Jelajahi Alam & Budaya Garut
  </div>
</footer>

  <script src="wishlist.js"></script>

</body>
</html>
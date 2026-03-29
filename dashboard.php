<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php');
    exit();
}

// Data Wisata Dummy (menggantikan database)
$wisata_data = [
    [
        'id' => 1,
        'nama' => 'Cipanas',
        'deskripsi' => 'Pemandian air panas alami dengan pemandangan indah',
        'lokasi' => 'Cipanas, Garut',
        'harga' => 'Rp 15.000',
        'rating' => 4.5,
        'gambar' => '🏞️'
    ],
    [
        'id' => 2,
        'nama' => 'Kampung Sampireun',
        'deskripsi' => 'Desa wisata Sunda dengan suasana pedesaan autentik',
        'lokasi' => 'Caringin, Garut',
        'harga' => 'Rp 25.000',
        'rating' => 4.8,
        'gambar' => '🏘️'
    ],
    [
        'id' => 3,
        'nama' => 'Telaga Bodas',
        'deskripsi' => 'Telaga kawah vulkanik dengan air berwarna hijau toska',
        'lokasi' => 'Pangalengan, Garut',
        'harga' => 'Rp 20.000',
        'rating' => 4.7,
        'gambar' => '🌋'
    ]
];

// CREATE - Tambah wisata baru
if ($_POST && isset($_POST['action']) && $_POST['action'] === 'create') {
    $new_wisata = [
        'id' => count($wisata_data) + 1,
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
        'lokasi' => $_POST['lokasi'],
        'harga' => $_POST['harga'],
        'rating' => floatval($_POST['rating']),
        'gambar' => $_POST['gambar'] ?: '🌟'
    ];
    array_push($wisata_data, $new_wisata);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TOUGAR Garut</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="dashboard-body">
    <nav class="navbar">
        <div class="nav-brand">
            <i class="fas fa-mountain-sun"></i>
            <span>TOUGAR Garut</span>
        </div>
        <div class="nav-user">
            <span>Halo, <?php echo $_SESSION['username']; ?>!</span>
            <a href="logout.php" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
    </nav>

    <div class="dashboard-container">
        <!-- Form CREATE -->
        <div class="card create-card">
            <h2><i class="fas fa-plus"></i> Tambah Wisata Baru</h2>
            <form method="POST" class="create-form">
                <input type="hidden" name="action" value="create">
                <div class="form-row">
                    <div class="input-group">
                        <label>Nama Wisata</label>
                        <input type="text" name="nama" required>
                    </div>
                    <div class="input-group">
                        <label>Emoji Gambar</label>
                        <input type="text" name="gambar" maxlength="2" placeholder="🏞️">
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" required>
                    </div>
                    <div class="input-group">
                        <label>Harga</label>
                        <input type="text" name="harga" placeholder="Rp 20.000" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group full">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" rows="3" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-group">
                        <label>Rating (1-5)</label>
                        <input type="number" name="rating" min="1" max="5" step="0.1" value="4.5">
                    </div>
                </div>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Simpan Wisata
                </button>
            </form>
        </div>

        <!-- Tabel READ -->
        <div class="card table-card">
            <div class="table-header">
                <h2><i class="fas fa-list"></i> Daftar Wisata (<?php echo count($wisata_data); ?>)</h2>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Harga</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($wisata_data as $wisata): ?>
                        <tr>
                            <td><?php echo $wisata['gambar']; ?></td>
                            <td><?php echo htmlspecialchars($wisata['nama']); ?></td>
                            <td><?php echo substr(htmlspecialchars($wisata['deskripsi']), 0, 50) . '...'; ?></td>
                            <td><?php echo htmlspecialchars($wisata['lokasi']); ?></td>
                            <td><?php echo $wisata['harga']; ?></td>
                            <td>
                                <div class="rating">
                                    <span class="stars">
                                        <?php for($i=1; $i<=5; $i++): ?>
                                            <i class="fas fa-star <?php echo $i <= $wisata['rating'] ? 'filled' : ''; ?>"></i>
                                        <?php endfor; ?>
                                    </span>
                                    <span>(<?php echo $wisata['rating']; ?>)</span>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>

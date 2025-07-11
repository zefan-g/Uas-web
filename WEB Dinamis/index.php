<?php
include 'config.php';

// Ambil data terakhir dari masing-masing tabel
$biodata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM biodata ORDER BY id DESC LIMIT 1"));
$pendidikan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pendidikan ORDER BY id DESC LIMIT 1"));
$kontak = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kontak ORDER BY id DESC LIMIT 1"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Saya (Dinamis)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <header class="ios-header text-center py-4">
        <h1>Biodata Pribadi (Dinamis)</h1>
    </header>

    <!-- Menu Navigasi -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#" onclick="showSection('biodata')">Biodata</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('pendidikan')">Pendidikan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('kontak')">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Isi -->
    <main class="container my-4">
        <section id="biodata">
            <h2>Biodata</h2>
            <div class="card ios-card p-3">
                <form id="biodataForm">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control ios-input" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="ttl" class="form-label">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control ios-input" id="ttl" required>
                    </div>
                    <div class="mb-3">
                        <label for="jk" class="form-label">Jenis Kelamin</label>
                        <select class="form-select ios-input" id="jk" required>
                            <option value="">Pilih</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control ios-input" id="alamat" required>
                    </div>
                    <button type="submit" class="btn btn-primary ios-btn">Simpan</button>
                </form>
                <div id="biodataDisplay" class="mt-4" style="display:none;">
                    <h5>Data Tersimpan:</h5>
                    <ul class="list-group">
                        <li class="list-group-item ios-list"><strong>Nama:</strong> <span id="dispNama"></span></li>
                        <li class="list-group-item ios-list"><strong>Tempat, Tanggal Lahir:</strong> <span id="dispTtl"></span></li>
                        <li class="list-group-item ios-list"><strong>Jenis Kelamin:</strong> <span id="dispJk"></span></li>
                        <li class="list-group-item ios-list"><strong>Alamat:</strong> <span id="dispAlamat"></span></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="pendidikan" style="display:none;">
            <h2>Pendidikan</h2>
            <div class="card ios-card p-3">
                <form id="pendidikanForm">
                    <div class="mb-3">
                        <label for="sd" class="form-label">SD</label>
                        <input type="text" class="form-control ios-input" id="sd" required>
                    </div>
                    <div class="mb-3">
                        <label for="smp" class="form-label">SMP</label>
                        <input type="text" class="form-control ios-input" id="smp" required>
                    </div>
                    <div class="mb-3">
                        <label for="sma" class="form-label">SMA</label>
                        <input type="text" class="form-control ios-input" id="sma" required>
                    </div>
                    <div class="mb-3">
                        <label for="kuliah" class="form-label">Kuliah</label>
                        <input type="text" class="form-control ios-input" id="kuliah" required>
                    </div>
                    <button type="submit" class="btn btn-primary ios-btn">Simpan</button>
                </form>
                <div id="pendidikanDisplay" class="mt-4" style="display:none;">
                    <h5>Data Tersimpan:</h5>
                    <ul class="list-group">
                        <li class="list-group-item ios-list"><strong>SD:</strong> <span id="dispSd"></span></li>
                        <li class="list-group-item ios-list"><strong>SMP:</strong> <span id="dispSmp"></span></li>
                        <li class="list-group-item ios-list"><strong>SMA:</strong> <span id="dispSma"></span></li>
                        <li class="list-group-item ios-list"><strong>Kuliah:</strong> <span id="dispKuliah"></span></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="kontak" style="display:none;">
            <h2>Kontak</h2>
            <div class="card ios-card p-3">
                <form id="kontakForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control ios-input" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control ios-input" id="telepon" required>
                    </div>
                    <button type="submit" class="btn btn-primary ios-btn">Simpan</button>
                </form>
                <div id="kontakDisplay" class="mt-4" style="display:none;">
                    <h5>Data Tersimpan:</h5>
                    <ul class="list-group">
                        <li class="list-group-item ios-list"><strong>Email:</strong> <span id="dispEmail"></span></li>
                        <li class="list-group-item ios-list"><strong>Telepon:</strong> <span id="dispTelepon"></span></li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        &copy; 2024 Andi Saputra. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
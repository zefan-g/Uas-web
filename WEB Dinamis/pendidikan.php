<?php
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM pendidikan ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendidikan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="ios-header text-center py-4">
        <h1>Data Pendidikan</h1>
    </header>
    <main class="container my-4">
        <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>
        <div class="card ios-card p-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SD</th>
                        <th>SMP</th>
                        <th>SMA</th>
                        <th>Kuliah</th>
                        <th>Waktu Input</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['sd']) ?></td>
                        <td><?= htmlspecialchars($row['smp']) ?></td>
                        <td><?= htmlspecialchars($row['sma']) ?></td>
                        <td><?= htmlspecialchars($row['kuliah']) ?></td>
                        <td><?= htmlspecialchars($row['created_at']) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

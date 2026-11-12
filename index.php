<?php
require_once "koneksi.php";
$result = $conn->query("SELECT id_mahasiswa, nama, jurusan, alamat, telepon FROM mahasiswa ORDER BY id_mahasiswa ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; margin: 0; padding: 30px; color: #222; }
        .container { max-width: 900px; margin: auto; background: white; padding: 24px; border-radius: 10px; box-shadow: 0 2px 12px #0001; }
        h2 { color: #d97706; margin-top: 0; }
        form { display: grid; grid-template-columns: 180px 1fr; gap: 12px; align-items: center; }
        input, select { padding: 10px; border: 1px solid #bbb; border-radius: 5px; width: 100%; box-sizing: border-box; }
        button { grid-column: 2; width: fit-content; padding: 10px 18px; background: #d97706; color: white; border: 0; border-radius: 5px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 28px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #fef3c7; }
        .message { padding: 10px; background: #ecfdf5; border: 1px solid #a7f3d0; margin-bottom: 16px; border-radius: 5px; }
        @media (max-width: 600px) { body { padding: 12px; } form { grid-template-columns: 1fr; } button { grid-column: 1; } }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Input Data Mahasiswa</h2>
    <?php if (isset($_GET["status"])): ?>
        <div class="message">
            <?php
            if ($_GET["status"] === "sukses") echo "Data mahasiswa berhasil disimpan.";
            elseif ($_GET["status"] === "duplikat") echo "NIM sudah terdaftar. Gunakan NIM lain.";
            elseif ($_GET["status"] === "kosong") echo "Data belum lengkap. Harap isi seluruh kolom.";
            else echo "Data gagal disimpan.";
            ?>
        </div>
    <?php endif; ?>

    <form action="simpan.php" method="POST">
        <label for="id_mahasiswa">ID Mahasiswa / NIM</label>
        <input id="id_mahasiswa" type="text" name="id_mahasiswa" maxlength="6" required>

        <label for="nama">Nama</label>
        <input id="nama" type="text" name="nama" maxlength="30" required>

        <label for="jurusan">Jurusan</label>
        <select id="jurusan" name="jurusan" required>
            <option value="">- Pilih Jurusan -</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Mesin">Teknik Mesin</option>
            <option value="Teknik Elektro">Teknik Elektro</option>
            <option value="Komputer Akuntansi">Komputer Akuntansi</option>
        </select>

        <label for="alamat">Alamat</label>
        <input id="alamat" type="text" name="alamat" maxlength="100" required>

        <label for="telepon">No. Telepon</label>
        <input id="telepon" type="text" name="telepon" maxlength="12" required>

        <span></span>
        <button type="submit">Simpan Data</button>
    </form>

    <h2>Data Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>NIM</th><th>Nama</th><th>Jurusan</th><th>Alamat</th><th>No. Telepon</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row["id_mahasiswa"]) ?></td>
                <td><?= htmlspecialchars($row["nama"]) ?></td>
                <td><?= htmlspecialchars($row["jurusan"]) ?></td>
                <td><?= htmlspecialchars($row["alamat"]) ?></td>
                <td><?= htmlspecialchars($row["telepon"]) ?></td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">Belum ada data mahasiswa.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>

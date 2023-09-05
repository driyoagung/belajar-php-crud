<?php
require 'functions.php';
// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs['nama']);
// }
$mahasiswa = query('SELECT * FROM mahasiswa');
if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Dark theme styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #121212; /* Dark background */
            color: #fff; /* White text */
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #333; /* Dark gray borders */
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333; /* Dark gray header */
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #222; /* Dark gray table rows */
        }

        .hapus {
            color: #ff4d4d; /* Red for delete links */
        }

        form {
            text-align: center;
            margin: 20px 0;
        }

        input[type="text"] {
            padding: 5px;
            width: 60%;
            border-radius: 5px;
            border: 1px solid #444; /* Slightly lighter gray border */
            background-color: #333; /* Dark gray input background */
            color: #fff; /* White text */
        }

        .btn {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" class="btn">Tambah Data</a>
    <br>

    <form action="" method="post">
        <input type="text" name="keyword" placeholder="Ketikan sesuatu lah blo.." size="30" autofocus>
        <button type="submit" name="cari" class="btn">Cari</button>
    </form>
    
    <table border="1" cellpadding='10' cellspacing='2'>
        <br>
        <br>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Gambar</td>
            <td>nrp</td>
            <td>jurusan</td>
            <td>Aksi</td>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row): ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $row['nama'] ?></td>
            <td><img src="img/<?= $row[
                'gambar'
            ] ?>" alt="" width='100px' height="128px"></td>
            <td><?= $row['nrp'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td>
                <a href="ubah.php?id=<?= $row['id'] ?>">ubah</a>|
                <a href="hapus.php?id=<?= $row[
                    'id'
                ] ?>" class = 'hapus'onclick="return confirm('Yakin dek?');">hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
        
    </table>




</body>
</html>
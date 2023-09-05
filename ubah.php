<?php
require 'functions.php';

$id = $_GET['id'];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

if (isset($_POST['submit'])) {
    // cek apakah ada error
    if (ubah($_POST) > 0) {
        echo '<script>alert("data berhasil diupdate")
            document.location.href = "index.php";
            </script>';
    } else {
        echo '<script>alert("data gagal diupdate")
            document.location.href = "index.php";
            </script>';
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 30px;
        }
        a {
            display: inline-block;
            margin: 10px;
            padding: 5px 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
            margin: 20px auto;
            max-width: 500px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        img {
            max-width: 300px;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }
        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
    <body>
        <h1>Ubah Data Mahasiswa</h1>
        <a href="index.php">Kembali</a>
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <input type="hidden" name="id" value="<?= $mhs[0]['id'] ?>">
                <input type="hidden" name="gambarLama" value="<?= $mhs[0][
                    'gambar'
                ] ?>">
                <li>
                    <label for="nrp">NRP : </label>
                    <input type="text" name="nrp" id="nrp" value="<?= $mhs[0][
                        'nrp'
                    ] ?>">
                </li>
                <li>
                    <label for="nama">Nama : </label>
                    <input type="text" name="nama" id="nama" value="<?= $mhs[0][
                        'nama'
                    ] ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs[0][
                    'jurusan'
                ] ?>">
            </li>
            <li>
    <label for="gambar">Gambar : </label><br>
    <img id="imagePreview" src="#" alt="Preview" style="max-width: 300px; display: none;">
    <img src="img/<?= $mhs[0][
        'gambar'
    ] ?>" alt="Gambar Lama" width='300px' height='300px'><br>
    <input type="file" name="gambar" id="gambar">
</li>

            <li>
                <button type="submit" name='submit'>Submit</button>
            </li>
        </ul>
    </form>
    <script>
        const imageInput = document.getElementById('gambar');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', (e) => {
            const selectedFile = e.target.files[0];
            if (selectedFile) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    imagePreview.src = event.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(selectedFile);
            }
        });
    </script>
</body>
</html>
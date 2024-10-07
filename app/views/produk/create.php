<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            line-height: 1.6;
        }
        header {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 1.5rem;
            font-size: 24px;
            letter-spacing: 2px;
        }
        nav a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }
        main {
            flex: 1;
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-container {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-submit {
            background-color: #27ae60;
            border: none;
        }
        .btn-submit:hover {
            background-color: #229954;
        }
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: auto;
            font-size: 14px;
        }
        /* Responsive */
        @media (max-width: 768px) {
            main {
                padding: 10px;
            }
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Car Management System</h1>
    </header>

    <main>
        <div class="form-container" id="add-car">
            <h2>Tambah Motor Baru</h2>
            <form action="<?= BASEURL ?>/produk/store" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_mobil">Nama Motor:</label>
                    <input type="text" id="nama_mobil" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok:</label>
                    <input type="text" id="stok" name="stok" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <input type="text" id="deskripsi" name="deskripsi" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga (Rp):</label>
                    <input type="number" id="harga" name="harga" required min="0">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar:</label>
                    <input type="file" id="gambar" name="gambar" required>
                </div>
                <button type="submit" class="btn btn-submit">Tambah Motor</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Car Management System. All rights reserved.</p>
    </footer>
</body>
</html>

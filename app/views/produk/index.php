<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <title>Toko Motor</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem;
            margin-top: auto;
        }
        .action-links a {
            display: inline-block;
            padding: 6px 12px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-size: 14px;
        }
        .edit {
            background-color: #3498db;
        }
        .delete {
            background-color: #e74c3c;
        }
        h2 {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <header class="bg-primary text-white text-center py-4">
        <h1>Toko Motor</h1>
    </header>

    <main class="container my-5">
        <h2>Motor List</h2>

        <div class="mb-3">
            <a href="<?= BASEURL;?>/produk/create" class="btn btn-success">Tambah Motor</a>
            <a href="<?= BASEURL;?>/produk/sale" class="btn btn-warning">Hasil Penjualan</a>
        </div>

        <table id="pengaduanTable" class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['produk'] as $row) : ?>
                <tr>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td><?= $row['stok'] ?></td>
                    <td><img height="100px" width="100px" src="<?=BASEURL?>/img/<?=$row['gambar']?>" alt="Foto Produk"></td>
                    <td class="action-links">
                        <a href="<?= BASEURL ?>/produk/show/<?= $row['id'] ?>" class="btn btn-primary edit">Ubah</a>
                        <a href="<?= BASEURL ?>/produk/delete/<?= $row['id'] ?>" class="btn btn-danger delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Total Stock = <?= $data['totalStok']['total'] ?></h2>

        <a href="<?= BASEURL;?>/auth/logout" class="btn btn-danger">Logout</a>
    </main>

    <footer>
        <p>&copy; 2024 Toko Motor. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pengaduanTable').DataTable();
        });
    </script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 40px;
            font-size: 42px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .search-container {
            text-align: center;
            margin: 20px auto;
        }

        .search-container input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 18px;
            border: 2px solid #3498db;
            border-radius: 8px;
            outline: none;
        }

        .search-container button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 600;
            margin-left: 5px;
            transition: background-color 0.3s ease;
        }

        .search-container button:hover {
            background-color: #2980b9;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-card {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 25px;
            margin: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 280px;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .product-image {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .product-name {
            font-size: 24px;
            font-weight: 600;
            margin: 15px 0;
            color: #34495e;
        }

        .product-price {
            color: #e74c3c;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .product-form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .product-form input[type="number"] {
            width: 70px;
            padding: 12px;
            font-size: 16px;
            border: 2px solid #3498db;
            border-radius: 8px 0 0 8px;
            outline: none;
        }

        .product-form button {
            padding: 12px 25px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .product-form button:hover {
            background-color: #2980b9;
        }

        .alert-success {
            background-color: #2ecc71;
            color: white;
            text-align: center;
            padding: 15px;
            margin: 20px auto;
            max-width: 80%;
            border-radius: 8px;
            font-size: 18px;
        }

        footer {
            text-align: center;
            padding: 25px;
            background-color: #34495e;
            color: white;
            position: relative;
            width: 100%;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <h1>Our Products</h1>

    <!-- Search Form -->
    <div class="search-container">
        <form action="<?= BASEURL ?>/produk/search" method="POST">
            <input type="text" name="query" placeholder="Search products...">
            <button type="submit">Search</button>
        </form>
    </div>

    <?php if(isset($data['success'])) : ?>
        <div class="alert-success">
            <?= $data['success'] ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <?php foreach ($data['produk'] as $produk) : ?>
        <div class="product-card">
            <img src="<?=BASEURL?>/img/<?=$produk['gambar']?>" alt="<?= $produk['nama'] ?>" class="product-image">
            <div class="product-name"><?= $produk['nama']?></div>
            <div class="product-price">Rp. <?= number_format($produk['harga'], 0, ',', '.') ?></div>

            <form action="<?= BASEURL?>/sale/store" method="POST" class="product-form">
                <input name="produk_id" type="hidden" value="<?= $produk['id'] ?>">
                <input type="number" name="quantity" value="1" min="1" step="1">
                <button type="submit">Buy Now</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <p>&copy; 2024 Our Products. All rights reserved.</p>
    </footer>

</body>
</html>

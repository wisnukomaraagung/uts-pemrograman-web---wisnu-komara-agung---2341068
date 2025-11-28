<?php 
session_start();

// contoh data produk + gambar
$products = [
    1 => ["name" => "Laptop", "price" => 10000000, "image" => "laptop.jpg"],
    2 => ["name" => "Keyboard", "price" => 500000, "image" => "keyboard.jpg"],
    3 => ["name" => "Mouse", "price" => 400000, "image" => "mouse.jpg"],
    4 => ["name" => "Headset", "price" => 300000, "image" => "headset.jpg"],
    5 => ["name" => "Charger", "price" => 175000, "image" => "charger.jpg"],
    6 => ["name" => "Tv", "price" => 5000000, "image" => "tv.jpg"],
    7 => ["name" => "Hp", "price" => 7000000, "image" => "hp.jpg"],
    8 => ["name" => "Kipas", "price" => 200000, "image" => "kipas.jpg"]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Daftar Produk</h2>

<div class="product-list">
    <?php foreach ($products as $id => $p) { ?>
        <div class="product-card">

            <!-- GAMBAR PRODUK -->
            <img src="images/<?= $p['image'] ?>" width="150"><br>

            <h3><?= $p["name"]; ?></h3>
            <p>Harga: Rp <?= number_format($p["price"]); ?></p>

            <form action="cart.php" method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="action" value="add">
                <button type="submit">Tambah ke Keranjang</button>
            </form>
        </div>
    <?php } ?>
</div>

</body>
</html>

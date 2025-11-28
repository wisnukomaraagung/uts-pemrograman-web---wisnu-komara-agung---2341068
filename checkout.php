<?php 
session_start();

// Produk master + gambar
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
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Checkout</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Gambar</th>
    <th>Produk</th>
    <th>Jumlah</th>
    <th>Total</th>
</tr>

<?php 
$grandTotal = 0;

foreach ($_SESSION["cart"] as $id => $qty) {
    $name  = $products[$id]["name"];
    $price = $products[$id]["price"];
    $image = $products[$id]["image"];
    $total = $qty * $price;
    $grandTotal += $total;
?>
<tr>
    <td><img src="images/<?= $image ?>" width="80"></td>
    <td><?= $name ?></td>
    <td><?= $qty ?></td>
    <td>Rp <?= number_format($total) ?></td>
</tr>
<?php } ?>
</table>

<h3>Total Bayar: Rp <?= number_format($grandTotal) ?></h3>

<h3>Terima kasih sudah belanja! 😊</h3>

<!-- ===== BUTTON KEMBALI ===== -->
<a href="index.php" class="btn-back"><<<~~~ Kembali ke Produk</a>

<?php 
// reset keranjang setelah checkout
$_SESSION["cart"] = [];
?>

</body>
</html>

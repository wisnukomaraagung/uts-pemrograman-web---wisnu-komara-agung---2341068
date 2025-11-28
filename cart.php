<?php
session_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Tambah produk
if (isset($_POST["action"]) && $_POST["action"] == "add") {
    $id = $_POST["id"];
    if (isset($_SESSION["cart"][$id])) {
        $_SESSION["cart"][$id]++;
    } else {
        $_SESSION["cart"][$id] = 1;
    }
}

// Update jumlah
if (isset($_POST["action"]) && $_POST["action"] == "update") {
    foreach ($_POST["qty"] as $id => $qty) {
        if ($qty <= 0) {
            unset($_SESSION["cart"][$id]);
        } else {
            $_SESSION["cart"][$id] = $qty;
        }
    }
}

// Hapus item
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    unset($_SESSION["cart"][$id]);
}

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
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Keranjang Belanja</h2>

<a href="index.php">← Kembali ke Produk</a><br><br>

<form method="POST">
<input type="hidden" name="action" value="update">

<table border="1" cellpadding="10">
<tr>
    <th>Gambar</th>
    <th>Produk</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Total</th>
    <th>Aksi</th>
</tr>

<?php 
$grandTotal = 0;
foreach ($_SESSION["cart"] as $id => $qty) {
    $name = $products[$id]["name"];
    $price = $products[$id]["price"];
    $image = $products[$id]["image"];
    $total = $qty * $price;
    $grandTotal += $total;
?>
<tr>
    <td>
        <img src="images/<?= $image ?>" width="80">
    </td>
    <td><?= $name ?></td>
    <td>Rp <?= number_format($price) ?></td>
    <td><input type="number" name="qty[<?= $id ?>]" value="<?= $qty ?>"></td>
    <td>Rp <?= number_format($total) ?></td>
    <td><a href="cart.php?delete=<?= $id ?>">Hapus</a></td>
</tr>
<?php } ?>
</table>

<br>
<button type="submit">Update Keranjang</button>
</form>

<h3>Total Bayar: Rp <?= number_format($grandTotal) ?></h3>

<a href="checkout.php"><button>Checkout</button></a>

</body>
</html>

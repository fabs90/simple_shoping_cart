<?php
require 'connection.php';
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ultramarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color:#e9967a">
      <div class="container">
        <a class="navbar-brand" href="index.php">Ultramarket</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#About">About</a>
            </li>
            <li class="nav-item ms-1">
              <a class="nav-link"  href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <!-- Tampil cart -->
  <div class="col-md-11 text-center">
    <h2 class="text-center">CART</h2>

    <?php
// Deklrasi variabel total = 0
$total = 0;

$output = "";

$output .= "
    <table class='table table-bordered  table-striped'>
    <thead class='table-dark'>
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Item Price</th>
        <th>Item Quantity</th>
        <th>Total Price</th>
        <th>Action</th>
    </tr>
    </thead>
";
// Kalo session_cart ga kosong
if (!empty($_SESSION["cart"])) {
    // Loop isi cart
    foreach ($_SESSION["cart"] as $key) {
        // Concat string  variabel output supaya table bisa kebawah
        $output .= "
        <tr>
            <td>" . $key['id'] . "</td>
            <td>" . $key['nama'] . "</td>
            <td>" . $key['harga'] . "</td>
            <td>" . $key['jumlah_barang'] . "</td>
            <td>" . number_format($key['jumlah_barang'] * $key['harga'], 2) . "</td>
            <td>
                <a href='index.php?action=remove&id=" . $key['id'] . "'>
                <button class='btn btn-danger btn-block'>Remove</button>
                </a>
            </td>
        </tr>
        ";

        $total += $key['jumlah_barang'] * $key['harga'];
    }

    $output .= "
    <tr>
        <td colspan='3'></td>
        <td></b>Total Price</b></td>
        <td>" . number_format($total, 2) . "</td>
        <td>
        <a href='clear.php'>
        <button class='btn btn-warning btn-block'>Clear All</button>
        </a>
        </td>
    </tr>

    ";
}

echo $output;
?>
  </div>


    <p><a href="index.php">back to products</a></p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

<?php
require 'connection.php';
// Karena di validation udah ada session jadi gosah start lg di halaman ini
// Cukup sambungin file yg udah ada session_start();
require 'validation.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ultramarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  </head>
  <body id = "home">
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


<div class='col-md-11 text-center'>
  <div class='row'>

  <!-- Menampilkan Data Barang dari DB -->
<?php
$query = "SELECT * FROM tbl_product";

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result)) {
    ?>
    <div class="col-md-4">
    <form action='index.php?id=<?=$row['id']?>' method="post">
    <!-- Menampilkan Detail Barang -->
    <img src="images/<?=$row['image']?>" style="height: 150px;" class="rounded mx-auto d-block">
    <h5 class="text-center"><?=$row['name']?></h5>
    <h5 class="text-center">$<?=number_format($row['price'], 2)?></h5>

    <!-- Mengambil Data dari form dari textbox input dan button submit -->
    <input type="hidden" name="nama" value="<?=$row['name']?>" >
    <input type="hidden" name="harga" value="<?=$row['price']?>" >
    <input type="number" name="jumlah_barang" value="1" class="form-control">
    <input type="submit" name="kirim" class="btn btn-warning btn-block my-2" value="Add To Cart">
    </form>
    </div>

<?php
}
?>
</div>
</div>


<!-- About -->
<section id="About">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>About Us</h2>
          </div>
        </div>
        <div class="row justify-content-center fs-5 text-center">
          <div class="col-md-4">
            <p>Ultramarket adalah e-commerce ter depan dalam menyebarkan produk dalam negeri agar tidak kalah dengan produk negara lain  </p>
          </div>
          <div class="col-md-4">
            <p>Dibuat dengan design2 kece oleh designer lokal kita yg gaakan kalah saing sama produk luar bro...</p>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#e2edff"
          fill-opacity="1"
          d="M0,224L40,197.3C80,171,160,117,240,122.7C320,128,400,192,480,213.3C560,235,640,213,720,202.7C800,192,880,192,960,170.7C1040,149,1120,107,1200,85.3C1280,64,1360,64,1400,64L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"
        ></path>
      </svg>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

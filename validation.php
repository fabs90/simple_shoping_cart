<?php
session_start();
$success = array();
$errors = array();

// (Add To Cart)
if (isset($_POST["kirim"])) {
    // Ambil data dari inputan user
    $id = $_GET["id"];
    $nama = $_POST["nama"];
    $harga = number_format($_POST["harga"], 2);
    $jumlah_barang = $_POST["jumlah_barang"];

    // Kalau blom ada array session_cart, buat
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'][] = array(
            'id' => $id,
            'nama' => $nama,
            'harga' => $harga,
            'jumlah_barang' => $jumlah_barang,
        );
    } else {
        // Ambil semua ID saja dari array session_cart
        $SESSION_CART_ID = array_column($_SESSION['cart'], 'id');
        // Kalo id nya gaada di array, masukin ke array
        if (!in_array($id, $SESSION_CART_ID)) {
            $_SESSION['cart'][] = array(
                'id' => $id,
                'nama' => $nama,
                'harga' => $harga,
                'jumlah_barang' => $jumlah_barang,
            );
        }
    }
}

// (Menghapus Item dari Cart)
if (isset($_GET["action"])) {
    if (isset($_GET['action']) == 'remove') {
        // Menangkap id dari url
        $id = $_GET["id"];
        // Loop array session_cart
        foreach ($_SESSION['cart'] as $key => $value) {
            // Jika value[id] == id di url
            if ($value['id'] == $id) {
                // Menghapus dgn cara unset key yg sesuai sama id
                unset($_SESSION['cart'][$key]);
                $success['delete'] = "Sucessfully Delete";
            }
        }
    }
}

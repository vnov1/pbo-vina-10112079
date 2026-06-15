<?php
require_once __DIR__ . '/class/Auth.php';
$auth = new Auth();
$auth->checkAuth();

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/uas";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Stok Gudang Barang</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul class="nav-menu">
                <li><a href="<?php echo $base_url; ?>/beranda.php">Beranda</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Kelola Data</a>
                    <div class="dropdown-content">
                        <a href="<?php echo $base_url; ?>/jenis/index.php">Data Gudang</a>
                        <a href="<?php echo $base_url; ?>/barang/index.php">Data Barang</a>
                        <a href="<?php echo $base_url; ?>/user/index.php">Data Pengguna</a>
                        <a href="<?php echo $base_url; ?>/customer/index.php">Data Customer</a>
                        <a href="<?php echo $base_url; ?>/supplier/index.php">Data Supplier</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Kelola Transaksi</a>
                    <div class="dropdown-content">
                        <a href="<?php echo $base_url; ?>/pembelian/index.php">Transaksi Pembelian</a>
                        <a href="<?php echo $base_url; ?>/penjualan/index.php">Transaksi Penjualan</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Kelola Laporan</a>
                    <div class="dropdown-content">
                        <a href="<?php echo $base_url; ?>/laporan/index.php">Laporan Transaksi Penjualan</a>
                    </div>
                </li>
                <li><a href="<?php echo $base_url; ?>/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="main-content">

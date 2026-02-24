<?php

class Produk {

    public $nama;
    public $harga;

    // Method menentukan status harga
    public function statusHarga() {
        if ($this->harga > 100000) {
            return "Produk Mahal";
        } else {
            return "Produk Terjangkau";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Produk Halal</title>
</head>
<body>

<h2>Data Produk</h2>

<form method="POST">
    
    Nama Produk :
    <input type="text" name="nama" required>
    <br><br>

    Harga :
    <input type="number" name="harga" required>
    <br><br>

    <input type="submit" name="submit" value="Simpan">

</form>

<?php

if (isset($_POST['submit'])) { // Jika tombol submit ditekan

    $produk1 = new Produk(); // Membuat objek

    $produk1->nama  = htmlspecialchars($_POST['nama']); // Mengambil dan mengamankan input
    $produk1->harga = htmlspecialchars($_POST['harga']);

    echo "<h2>Data Produk</h2>";
    echo "Nama Produk : " . $produk1->nama . "<br>";
    echo "Harga : Rp " . $produk1->harga . "<br>";
    echo "Status : " . $produk1->statusHarga();
}
?>

</body>
</html>

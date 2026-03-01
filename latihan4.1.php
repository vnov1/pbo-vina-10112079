<?php

//function
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

class Belanja
{
    public $namaPembeli;
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBeli;

    public function hitungSubtotal()
    {
        return $this->hargaBarang * $this->jumlahBeli;
    }

    public function hitungTotalDenganDiskon($persenDiskon)
    {
        $subtotal = $this->hitungSubtotal();
        $diskon = ($persenDiskon / 100) * $subtotal;
        return $subtotal - $diskon;
    }
}

$data = [
    "namaPembeli" => "Jae",
    "namaBarang"  => "Handpone",
    "hargaBarang" => 4000000,
    "jumlahBeli"  => 1
];

$belanja = new Belanja();
$belanja->namaPembeli = $data["namaPembeli"];
$belanja->namaBarang  = $data["namaBarang"];
$belanja->hargaBarang = $data["hargaBarang"];
$belanja->jumlahBeli  = $data["jumlahBeli"];

echo "<h2>STRUK BELANJA WARUNG</h2>";
echo "Nama Pembeli : " . $belanja->namaPembeli . "<br>";
echo "Nama Barang  : " . $belanja->namaBarang . "<br>";
echo "Harga Barang : " . formatRupiah($belanja->hargaBarang) . "<br>";
echo "Jumlah Beli  : " . $belanja->jumlahBeli . "<br><br>";

echo "Subtotal     : " . formatRupiah($belanja->hitungSubtotal()) . "<br>";
echo "Total (Diskon 10%) : " . formatRupiah($belanja->hitungTotalDenganDiskon(10)) . "<br>";
?>
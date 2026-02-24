<?php
class Kendaraan
{
    public $jumlahRoda = 4;
    public $warna = "Hitam";
    public $bahanBakar = "Premium";
    public $harga = 10000000;
    public $merek = "Toyota";
    public $tahunPembuatan = 2004

    public function statusHarga(): string
    {
        if ($this->harga > 50000000) {
            $status = "Harga Kendaraan Mahal";
        } else {
            $status = "Harga Kendaraan Murah";
        }
        return $status;
    }

    public function statusSubsidi(): string
    {
        if ($this->tahunPembuatan < 2005 && $this->bahanBakar == "Premium") {
            $status = "DAPAT SUBSIDI";
        } else {
            $status = "TIDAK DAPAT SUBSIDI";
        }
        return $status;
    }
}

// instansiasi objek
$objekKendaraan = new Kendaran
echo "Jumlah Roda : " . $objekKendaraan->jumlahRoda . "<br>";
echo "Status Harga : " . $objekKendaraan->statusHarga() . "<br>";
echo "Status Subsidi : " . $objekKendaraan->statusSubsidi();
?>
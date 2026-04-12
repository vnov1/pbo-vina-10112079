<?php

class Employee {
    protected $nama;
    protected $gaji;
    protected $lamaKerja;

    public function __construct($nama, $gaji, $lamaKerja) {
        $this->nama = $nama;
        $this->gaji = $gaji;
        $this->lamaKerja = $lamaKerja;
    }

    public function hitungGaji($bonus = 0) {
        return $this->gaji + $bonus;
    }

    public function tampil() {
        echo "Nama: {$this->nama}<br>";
        echo "Gaji Pokok: {$this->gaji}<br>";
        echo "Lama Kerja: {$this->lamaKerja} tahun<br>";
    }
}

class Programmer extends Employee {
    public function hitungGaji($bonus = 0) {
        if ($this->lamaKerja < 1) {
            $bonus = 0;
        } elseif ($this->lamaKerja <= 10) {
            $bonus = 0.01 * $this->lamaKerja * $this->gaji;
        } else {
            $bonus = 0.02 * $this->lamaKerja * $this->gaji;
        }
        return $this->gaji + $bonus;
    }
}

class Direktur extends Employee {
    public function hitungGaji($bonus = 0) {
        $bonus = 0.5 * $this->lamaKerja * $this->gaji;
        $tunjangan = 0.1 * $this->lamaKerja * $this->gaji;
        return $this->gaji + $bonus + $tunjangan;
    }
}

class PegawaiMingguan extends Employee {
    private $hargaBarang;
    private $stock;
    private $terjual;

    public function __construct($nama, $gaji, $lamaKerja, $hargaBarang, $stock, $terjual) {
        parent::__construct($nama, $gaji, $lamaKerja);
        $this->hargaBarang = $hargaBarang;
        $this->stock = $stock;
        $this->terjual = $terjual;
    }

    public function hitungGaji($bonus = 0) {
        $persen = ($this->terjual / $this->stock) * 100;

        if ($persen > 70) {
            $bonus = 0.10 * $this->hargaBarang * $this->terjual;
        } else {
            $bonus = 0.03 * $this->hargaBarang * $this->terjual;
        }

        return $this->gaji + $bonus;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pegawai</title>
</head>
<body>

<h2>Form Input Pegawai</h2>

<form method="POST">
    Nama: <input type="text" name="nama" required><br><br>
    Gaji: <input type="number" name="gaji" required><br><br>
    Lama Kerja (tahun): <input type="number" name="lamaKerja" required><br><br>

    Jenis Pegawai:
    <select name="jenis" required>
        <option value="programmer">Programmer</option>
        <option value="direktur">Direktur</option>
        <option value="mingguan">Pegawai Mingguan</option>
    </select><br><br>

    <!-- Khusus Pegawai Mingguan -->
    Harga Barang: <input type="number" name="hargaBarang"><br><br> 
    Stock: <input type="number" name="stock"><br><br>
    Terjual: <input type="number" name="terjual"><br><br>

    <button type="submit" name="proses">Hitung Gaji</button>
</form>

<hr>

<?php
// proses
if (isset($_POST['proses'])) {

    $nama = $_POST['nama'];
    $gaji = $_POST['gaji'];
    $lamaKerja = $_POST['lamaKerja'];
    $jenis = $_POST['jenis'];

    // Percabangan
    if ($jenis == "programmer") {
        $pegawai = new Programmer($nama, $gaji, $lamaKerja);

    } elseif ($jenis == "direktur") {
        $pegawai = new Direktur($nama, $gaji, $lamaKerja);

    } else {
        $hargaBarang = $_POST['hargaBarang'];
        $stock = $_POST['stock'];
        $terjual = $_POST['terjual'];

        $pegawai = new PegawaiMingguan(
            $nama, $gaji, $lamaKerja,
            $hargaBarang, $stock, $terjual
        );
    }

    echo "<h3>Hasil Perhitungan</h3>";
    $pegawai->tampil();
    echo "Total Gaji: " . $pegawai->hitungGaji();
}
?>

</body>
</html> 
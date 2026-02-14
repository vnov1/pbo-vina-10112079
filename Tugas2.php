<?php //sebagai tanda awal code php
class Suhu { //suhu sebagai nama dari class
    private $nilai; //untuk menyimpan nilai suhu yang di input oleh user (pengguna)

    public function __construct($nilai) { 
        $this->nilai = $nilai; //isi nilai suhu yang di input user
    }

    public function celsiusKeFahrenheit() { // Celsius
        return ($this->nilai * 9/5) + 32; //rumus mengubah celsius ke fahrenheit
    }
    public function celsiusKeKelvin() { 
        return $this->nilai + 273.15; //rumus mengubah celsius ke kelvin
    }

    public function fahrenheitKeCelsius() { //fahrenheit
        return ($this->nilai - 32) * 5/9; //rumus fahrenheit ke celsius
    }
    public function fahrenheitKeKelvin() {
        return ($this->nilai - 32) * 5/9 + 273.15; //rumus fahrenheit ke kelvin
    }

    public function kelvinKeCelsius() { // Kelvin
        return $this->nilai - 273.15; //rumus kelvin ke celsius
    }
    public function kelvinKeFahrenheit() {
        return ($this->nilai - 273.15) * 9/5 + 32; //rumus kelvin ke fahrenheit
    }
} //sebagai penutup dari class
?> 

<!DOCTYPE html>
<html>
<head>
    <title>kalkulator suhu_v</title> 
</head>
<body> 

<h1>kalkulator suhu_v</h1>

<form method="post">
    <label>Nilai Suhu:</label>
    <input type="number" step="any" name="nilai" required>
    <br><br>

    <label>Satuan:</label>
    <select name="satuan">
        <option value="celsius">Celsius</option>
        <option value="fahrenheit">Fahrenheit</option>
        <option value="kelvin">Kelvin</option>
    </select>
    <br><br>

    <button type="submit" name="hitung">Hitung</button>
</form>

<hr>

<?php
if (isset($_POST['hitung'])) {
    $nilai = $_POST['nilai'];
    $satuan = $_POST['satuan'];

    $suhu = new Suhu($nilai);

    if ($satuan == "celsius") {
        echo "<h3>Hasil konversi dari Celsius:</h3>";
        echo "Fahrenheit = " . round($suhu->celsiusKeFahrenheit(), 2) . "<br>";
        echo "Kelvin = " . round($suhu->celsiusKeKelvin(), 2);
    } 
    elseif ($satuan == "fahrenheit") {
        echo "<h3>Hasil konversi dari Fahrenheit:</h3>";
        echo "Celsius = " . round($suhu->fahrenheitKeCelsius(), 2) . "<br>";
        echo "Kelvin = " . round($suhu->fahrenheitKeKelvin(), 2);
    } 
    elseif ($satuan == "kelvin") {
        echo "<h3>Hasil konversi dari Kelvin:</h3>";
        echo "Celsius = " . round($suhu->kelvinKeCelsius(), 2) . "<br>";
        echo "Fahrenheit = " . round($suhu->kelvinKeFahrenheit(), 2);
    }
}
?>

</body>
</html>
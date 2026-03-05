<!DOCTYPE html>
<html>
<head>
    <title>Program Diskon Belanja</title>
</head>
<body>

<h2>Program Diskon Belanja</h2>

<form method="post">
    <label>Apakah memiliki kartu member?</label><br>
    <select name="kartu">
        <option value="ya">Ya</option>
        <option value="tidak">Tidak</option>
    </select><br><br>

    <label>Total Belanja:</label><br>
    <input type="number" name="totalBelanja" required><br><br>

    <button type="submit" name="proses">Proses</button>
</form>

<?php
if (isset($_POST['proses'])) {

    $kartu = $_POST['kartu'];
    $totalBelanja = $_POST['totalBelanja'];
    $diskon = 0;

    // Logika sesuai flowchart
    if ($kartu == "ya") {
        if ($totalBelanja > 500000) {
            $diskon = 50000;
        } elseif ($totalBelanja > 100000) {
            $diskon = 15000;
        }
    } else {
        if ($totalBelanja > 100000) {
            $diskon = 5000;
        }
    }

    $totalBayar = $totalBelanja - $diskon;

    echo "<hr>";
    echo "Kartu Member: $kartu <br>";
    echo "Total Belanja: Rp " . number_format($totalBelanja, 0, ',', '.') . "<br>";
    echo "Diskon: Rp " . number_format($diskon, 0, ',', '.') . "<br>";
    echo "<b>Total Bayar: Rp " . number_format($totalBayar, 0, ',', '.') . "</b>";
}
?>

</body>
</html>
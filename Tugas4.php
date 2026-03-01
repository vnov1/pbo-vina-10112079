<?php

class Mahasiswa {

    public $Nama;
    public $Kelas;
    public $MataKuliah;
    public $Nilai;

    public function Keterangan(){
        if ($this->Nilai >= 70) {
            return "Lulus Kuis";
        } else {
            return "Tidak Lulus Kuis";
        }
    }
}

$Data = [
[
    'Nama' => 'Aditya',
    'Kelas' => 'SI 2',
    'MataKuliah' => 'Pemrograman Berorientasi Objek',
    'Nilai' => 80
],
[
    'Nama' => 'Shinta',
    'Kelas' => 'SI 2',
    'MataKuliah' => 'Pemrograman Berorientasi Objek',
    'Nilai' => 75
],
[
    'Nama' => 'Ineu',
    'Kelas' => 'SI 2',
    'MataKuliah' => 'Pemrograman Berorientasi Objek',
    'Nilai' => 55    
]

];

foreach ($Data As $Item){
$Nilai = new Mahasiswa();
$Nilai->Nama = $Item["Nama"];
$Nilai->Kelas = $Item["Kelas"];
$Nilai->MataKuliah = $Item["MataKuliah"];
$Nilai->Nilai = $Item["Nilai"];

echo "<h2>DATA NILAI PBO MAHASISWA</h2>";
echo "Nama : " . $Nilai->Nama . "<br>";
echo "Kelas : " . $Nilai->Kelas . "<br>";
echo "Mata Kuliah : " . $Nilai->MataKuliah . "<br>";
echo "Nilai : " . $Nilai->Nilai . "<br>";
echo "Keterangan : " . $Nilai->Keterangan();
echo "<hr>";
}
?>
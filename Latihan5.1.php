<?php
 $Nilai = 170;

 //validasi nilai
if ($Nilai > 100) {
    echo "Data Tidak Valid";
} elseif ($Nilai > 60) {
    echo "Lulus";
} else {
    echo "Tidak Lulus";
}
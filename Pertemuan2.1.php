<?php
Class Belanja{ // ini adalah class belanja
    public string $NamaPembeli="jae"; // NamaPembeli bertype data string
    public string $NamaBarang="Pensil"; // NamaBarang bertype data string
    public int $HargaBarang=3000; // HargaBarang bertype data integer
    public int $JumlahBarang=2; 
    public float $TotalBayar=6000;
    public float $Diskon;

    public static float $pajak = 0.02; // value yg tidak dapat diubah(tetap)

    public function __construct($NamaPembeli, $NamaBarang, $HargaBarang, $JumlahBarang){
        $this->NamaPembeli = $NamaPembeli;
        $this->NamaBarang = $NamaBarang;
        $this->HargaBarang = $HargaBarang;
        $this->JumlahBarang = $JumlahBarang;  
    }

    public function HitungSubtotal (): float{ // aritmatika
        $Subtotal = $this->HargaBarang * $this->JumlahBarang;
        return $Subtotal;
    }

    public function HitungDiskon (): float{
        $Diskon = $this->TotalBayar * $this->Diskon;
        return $Diskon;
    }

    public function TotalSeluruh (): float{
        $TotalSeluruh = $this->TotalBayar - $this->HitungDiskon() + (self::$Pajak * $this->TotalBayar);
        return $TotalSeluruh;
    }


    public function tampilRincian (){
        echo"NamaPembeli :" . $this->NamaPembeli . "<br>";
        echo"NamaBarang :" . $this->NamaBarang . "<br>";
        echo"HargaBarang :" . $this->HargaBarang . "<br>";
        echo"JumlahBarang :" . $this->JumlahBarang . "<br>";
    }
}
$Belanja = new Belanja("jae", "Pencil", "3000", "2");
$Belanja->tampilRincian();

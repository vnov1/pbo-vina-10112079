<?php

class Tabungan{

    protected $nama;
    private $saldo;

    public function __construct($nama,$saldo){
        $this->nama = $nama;
        $this->saldo = $saldo;
    }

    public function getNama(){
        return $this->nama;
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function setor($uang){
        $this->saldo += $uang;
    }

    public function tarik($uang){
        if($uang <= $this->saldo){
            $this->saldo -= $uang;
        }
        else{
            echo "Saldo tidak cukup\n";
        }
    }
}

class Siswa extends Tabungan{}

$siswa = array(

    new Siswa("Siswa 1",50000),
    new Siswa("Siswa 2",60000),
    new Siswa("Siswa 3",70000)

);

echo "=== SALDO AWAL TABUNGAN ===\n";

for($i=0;$i<count($siswa);$i++){

    echo ($i+1).". ".
    $siswa[$i]->getNama().
    " : Rp ".
    $siswa[$i]->getSaldo().
    "\n";

}

echo "\nPilih siswa (1-3): ";
$pilih = trim(fgets(STDIN));

if($pilih >=1 && $pilih <=3){

    $index = $pilih - 1;

    echo "1. Setor Tunai\n";
    echo "2. Tarik Tunai\n";

    echo "Pilih transaksi: ";
    $menu = trim(fgets(STDIN));

    echo "Masukkan jumlah uang: ";
    $uang = trim(fgets(STDIN));

    if($menu == 1){

        $siswa[$index]->setor($uang);

    }
    elseif($menu == 2){

        $siswa[$index]->tarik($uang);

    }

    echo "\nSaldo sekarang ".
    $siswa[$index]->getNama().
    " : Rp ".
    $siswa[$index]->getSaldo().
    "\n";

}
else{

    echo "Siswa tidak ditemukan\n";

}

?>
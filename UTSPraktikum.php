<?php

class produk {
    private $NamaProduk;
    private $Harga;
    private $Stok;

    private $data = [];
    public function __construct(){
        echo "Program Produk Toko Sederhana Dimulai...\n";
    }
    public function __destruct(){
        echo "Program Selesai...\n";
        unset($this->data);
    }

    public function tampilkan(){
        echo "\n===== MENU PRODUK TOKO SEDERHANA =====\n";
        echo "No | Nama Produk | Stok | Harga \n";

        $no = 1;
        foreach($this->data as $d){
            echo $no++ ." | ".
                 $d['Nama Produk']." | ".
                 $d['Stok']." | ".
                 number_format($d['Harga'],0,",",".")."\n";
        }
    }

    public function tambah(){
        echo "Nama Produk: ";
        $NamaProduk = trim(fgets(STDIN));

        echo "Stok: ";
        $Stok = trim(fgets(STDIN));

        echo "Harga: ";
        $Harga= trim(fgets(STDIN));

        $this->data[] = [
            "Nama Produk"=>$NamaProduk,
            "Stok"=>$Stok,
            "Harga"=>$Harga
        ];

        echo "Data berhasil ditambahkan.\n";
    }

    public function update() {
        $this->tampilkan();
        echo "Update Nomor: ";
        $no = trim(fgets(STDIN));

        echo "Update Nama Produk Baru: ";
        $NamaProduk = trim(fgets(STDIN));

        echo "Update Harga Baru: ";
        $Harga = trim(fgets(STDIN));

        echo "Update Stok Baru: ";
        $Stok = trim(fgets(STDIN));
        
        $this->data[] = [
            "Nama Produk Baru"=>$NamaProduk,
            "Harga Baru"=>$Harga,
            "Stok Baru"=>$Stok
        ];
        unset($this->data[$no-1]);
        echo "Data diupdate.\n";

        foreach($this->data as $d){
            echo $no++ ." | ".
                 $d['Nama Produk Baru']." | ".
                 $d['Stok Baru']." | ".
                 number_format($d['Harga Baru'],0,",",".")."\n";
        }
    }    
    public function hapus(){
        $this->tampilkan();
        echo "Hapus nomor: ";
        $no = trim(fgets(STDIN));

        unset($this->data[$no-1]);
        echo "Data dihapus.\n";
    }    
}

$produk = new produk();

do {
    echo "\n===== MENU TOKO SEDERHANA =====\n";
    echo "1. Tampilkan Data Produk\n";
    echo "2. Tambah Produk\n";
    echo "3. Update Produk\n";
    echo "4. Hapus Produk\n";
    echo "Pilih menu: ";

    $menu = trim(fgets(STDIN));

    switch($menu){
        case 1:
            $produk->tampilkan();
            break;
        case 2:
            $produk->tambah();
            break;
        case 3:
            $produk->update();
            break;
        case 4:
            $produk->Hapus();
        case 5:
            echo "Keluar...\n";
            break;
        default:
            echo "Menu tidak ada\n";
    }

}while($menu != 5);

?>

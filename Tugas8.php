<?php

class Karyawan {
    public $nama;
    public $golongan;
    public $jam_lembur;
    public $gaji_pokok;
    public $gaji_lembur;
    public $total_gaji;

    // CONSTRUCTOR
    function __construct($nama, $golongan, $jam_lembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jam_lembur = $jam_lembur;
        $this->gaji_pokok = $this->getGajiPokok($golongan);
        $this->gaji_lembur = $jam_lembur * 15000;
        $this->total_gaji = $this->gaji_pokok + $this->gaji_lembur;
    }

    // METHOD GAJI POKOK
    function getGajiPokok($golongan) {
        $gaji = [
            "Ib"=>1250000, "Ic"=>1300000, "Id"=>1350000,
            "IIa"=>2000000, "IIb"=>2100000, "IIc"=>2200000, "IId"=>2300000,
            "IIIa"=>2400000, "IIIb"=>2500000, "IIIc"=>2600000, "IIId"=>2700000,
            "IVa"=>2800000, "IVb"=>2900000, "IVc"=>3000000, "IVd"=>3100000
        ];
        return $gaji[$golongan] ?? 0;
    }

    // DESTRUCTOR
    function __destruct() {
        // hanya contoh, otomatis dipanggil saat objek dihapus
    }
}

// ARRAY DATA
$data = [];

while (true) {
    echo "\n===== MENU GAJI KARYAWAN =====\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Update Data\n";
    echo "4. Hapus Data\n";
    echo "5. Keluar\n";
    echo "Pilih menu: ";

    $menu = trim(fgets(STDIN));

    switch ($menu) {

        case 1:
            echo "\n===== DATA GAJI KARYAWAN =====\n";
            echo "No | Nama | Golongan | Jam Lembur | Total Gaji\n";
            foreach ($data as $i => $k) {
                echo ($i+1)." | $k->nama | $k->golongan | $k->jam_lembur | Rp".number_format($k->total_gaji)."\n";
            }
            break;

        case 2:
            echo "Nama: ";
            $nama = trim(fgets(STDIN));

            echo "Golongan: ";
            $gol = trim(fgets(STDIN));

            echo "Jam Lembur: ";
            $jam = trim(fgets(STDIN));

            $data[] = new Karyawan($nama, $gol, $jam);
            echo "Data berhasil ditambahkan!\n";
            break;

        case 3:
            echo "Pilih nomor data yang diupdate: ";
            $i = trim(fgets(STDIN)) - 1;

            if (isset($data[$i])) {
                echo "Nama baru: ";
                $nama = trim(fgets(STDIN));

                echo "Golongan baru: ";
                $gol = trim(fgets(STDIN));

                echo "Jam lembur baru: ";
                $jam = trim(fgets(STDIN));

                $data[$i] = new Karyawan($nama, $gol, $jam);
                echo "Data berhasil diupdate!\n";
            } else {
                echo "Data tidak ditemukan!\n";
            }
            break;

        case 4:
            echo "Pilih nomor data yang dihapus: ";
            $i = trim(fgets(STDIN)) - 1;

            if (isset($data[$i])) {
                unset($data[$i]); // DESTRUCTOR bekerja di sini
                $data = array_values($data);
                echo "Data berhasil dihapus!\n";
            } else {
                echo "Data tidak ditemukan!\n";
            }
            break;

        case 5:
            echo "Keluar program...\n";
            exit;

        default:
            echo "Menu tidak valid!\n";
    }
}
?>
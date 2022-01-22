<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obat = [
            [
                'kodeObat' => 'CM001',
                'namaObat' => 'Prove D3-1000',
                'hargaObat' => 54000,
                'sisaObat' => 367,
                'tanggalKadaluarsa' => date('2021-12-06'),
            ],
            [
                'kodeObat' => 'CM002',
                'namaObat' => 'Becom-Zet',
                'hargaObat' => 43000,
                'sisaObat' => 76,
                'tanggalKadaluarsa' => date('2022-02-01'),
            ],
            [
                'kodeObat' => 'CM003',
                'namaObat' => 'Megazing',
                'hargaObat' => 33000,
                'sisaObat' => 150,
                'tanggalKadaluarsa' => date('2021-01-13'),
            ],
            [
                'kodeObat' => 'CM004',
                'namaObat' => 'Zegavit',
                'hargaObat' => 40000,
                'sisaObat' => 300,
                'tanggalKadaluarsa' => date('2022-01-07'),
            ],
            [
                'kodeObat' => 'CM005',
                'namaObat' => 'Panadol',
                'hargaObat' => 26000,
                'sisaObat' => 200,
                'tanggalKadaluarsa' => date('2022-03-09'),
            ],
            [
                'kodeObat' => 'CM006',
                'namaObat' => 'Zenirex',
                'hargaObat' => 27000,
                'sisaObat' => 146,
                'tanggalKadaluarsa' => date('2021-11-27'),
            ],
            [
                'kodeObat' => 'CM007',
                'namaObat' => 'Amoxilin',
                'hargaObat' => 19000,
                'sisaObat' => 90,
                'tanggalKadaluarsa' => date('2021-10-19'),
            ],
            [
                'kodeObat' => 'CM008',
                'namaObat' => 'Betadine',
                'hargaObat' => 13000,
                'sisaObat' => 89,
                'tanggalKadaluarsa' => date('2021-12-13'),
            ],
            [
                'kodeObat' => 'CM009',
                'namaObat' => 'Gliserol',
                'hargaObat' => 36000,
                'sisaObat' => 240,
                'tanggalKadaluarsa' => date('2022-04-06'),
            ],
            [
                'kodeObat' => 'CM010',
                'namaObat' => 'Promag',
                'hargaObat' => 11000,
                'sisaObat' => 241,
                'tanggalKadaluarsa' => date('2021-11-03'),
            ],
        ];

        for($i = 0; $i < count($obat);$i++) {
            Obat::create($obat[$i]);
        }
    }
}

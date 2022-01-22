<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransaksiObatKeluar;

class TransaksiObatKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'idTransaksi' => 'TRK001',
                'kodeObat' => 'CM004',
                'jumlahJual' => 16,
                'kodeApoteker' => 'AP001',
                'tanggalBeli' => date('2021-07-30'),
            ],
            [
                'idTransaksi' => 'TRK002',
                'kodeObat' => 'CM009',
                'jumlahJual' => 34,
                'kodeApoteker' => 'AP001',
                'tanggalBeli' => date('2021-08-09'),
            ],
            [
                'idTransaksi' => 'TRK003',
                'kodeObat' => 'CM007',
                'jumlahJual' => 21,
                'kodeApoteker' => 'AP002',
                'tanggalBeli' => date('2021-08-13'),
            ],
            [
                'idTransaksi' => 'TRK004',
                'kodeObat' => 'CM001',
                'jumlahJual' => 26,
                'kodeApoteker' => 'AP002',
                'tanggalBeli' => date('2021-08-27'),
            ],
            [
                'idTransaksi' => 'TRK005',
                'kodeObat' => 'CM004',
                'jumlahJual' => 65,
                'kodeApoteker' => 'AP002',
                'tanggalBeli' => date('2021-09-03'),
            ],
            [
                'idTransaksi' => 'TRK006',
                'kodeObat' => 'CM009',
                'jumlahJual' => 32,
                'kodeApoteker' => 'AP001',
                'tanggalBeli' => date('2021-09-06'),
            ],
            [
                'idTransaksi' => 'TRK007',
                'kodeObat' => 'CM005',
                'jumlahJual' => 13,
                'kodeApoteker' => 'AP002',
                'tanggalBeli' => date('2021-09-16'),
            ],
            [
                'idTransaksi' => 'TRK008',
                'kodeObat' => 'CM003',
                'jumlahJual' => 11,
                'kodeApoteker' => 'AP001',
                'tanggalBeli' => date('2021-09-28'),
            ],
            [
                'idTransaksi' => 'TRK009',
                'kodeObat' => 'CM009',
                'jumlahJual' => 28,
                'kodeApoteker' => 'AP001',
                'tanggalBeli' => date('2021-10-15'),
            ],
            [
                'idTransaksi' => 'TRK010',
                'kodeObat' => 'CM002',
                'jumlahJual' => 44,
                'kodeApoteker' => 'AP002',
                'tanggalBeli' => date('2021-10-20'),
            ],
        ];

        for($i = 0; $i < count($data); $i++) {
            TransaksiObatKeluar::create($data[$i]);
        }
    }
}

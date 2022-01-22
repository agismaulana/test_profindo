<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apoteker;

class ApotekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apoteker = [
            [
                'kodeApoteker' => 'AP001',
                'namaApoteker' => 'Indah',
                'tanggalLahir' => date('1996-03-07'),
            ],
            [
                'kodeApoteker' => 'AP002',
                'namaApoteker' => 'Ayu',
                'tanggalLahir' => date('1998-06-21'),
            ],
        ];

        for($i = 0; $i < count($apoteker); $i++) {
            Apoteker::create($apoteker[$i]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
class UserSeeder extends Seeder
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
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'apoteker_id' => null,
            ],
            [
                'name' => 'Indah',
                'email' => 'indah@gmail.com',
                'password' => Hash::make('indah'),
                'apoteker_id' => 'AP001',
            ],
            [
                'name' => 'Ayu',
                'email' => 'ayu@gmail.com',
                'password' => Hash::make('ayu'),
                'apoteker_id' => 'AP002',
            ],
        ];
    
        for($i = 0; $i < count($data); $i++) {
            User::create($data[$i]);
        }
    }
}

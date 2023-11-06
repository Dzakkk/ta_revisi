<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class bioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nip' => '123',
                'nama' => 'John Doe',
                'password' => Hash::make('123'),
                'role' => 'pegawai',
               
            ],
            [
                'nip' => '456',
                'nama' => 'Syuaib',
                'password' => Hash::make('456'),
                'role' => 'petugas',
             
            ],
            [
                'nip' => '890',
                'nama' => 'Kevin Muller',
                'password' => Hash::make('890'),
                'role' => 'kepala_sekolah',
              
            ],
            // Add more data here as needed
        ];

        // Insert the data into the "pegawai" table
        DB::table('pegawai')->insert($data);
    }
}

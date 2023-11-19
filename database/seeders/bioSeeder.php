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
                'nip' => '1985072320005022001',
                'nama' => 'John Doe',
                'password' => Hash::make('22001'),
                'role' => 'pegawai',
               
            ],
            [ 
                'nip' => '199209262017051001',
                'nama' => 'Syuaib',
                'password' => Hash::make('51001'),
                'role' => 'petugas',
             
            ],
            [
                'nip' => '199009282015051002',
                'nama' => 'Kevin Muller',
                'password' => Hash::make('51002'),
                'role' => 'kepala_sekolah',
              
            ],
            // Add more data here as needed
        ];

        // Insert the data into the "pegawai" table
        DB::table('pegawai')->insert($data);
    }
}

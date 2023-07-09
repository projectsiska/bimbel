<?php

namespace Database\Seeders;
use App\Models\Pembayaran;
use App\Models\User; 
use App\Models\Periode; 
use App\Models\biaya;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        User::factory(3)->create();  
        //biaya::factory(8)->create();
   

  User::create([
        'name'=> 'Admin',
        'email'=> 'admin@gmail.com',
        'level'=> 'Administrator',
        'username'=> 'admin',
        'password'=> bcrypt('admin')
        ],
        
        [
            'name'=> 'Pimpinan',
            'email'=> 'pimpinan@gmail.com',
            'level'=> 'Pimpinan',
            'username'=> 'pimpinan',
            'password'=> bcrypt('pimpinan')
        ]

    );


    
    biaya::create([
        'harga'=> '1200000',
        'keterangan'=> 'Total Biaya', 
    ]);

    }
}

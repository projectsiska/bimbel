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
         
   

        User::create([
                'nama'=> 'Admin',
                'email'=> 'admin@gmail.com',
                'level'=> 'Administrator',
                'username'=> 'admin',
                'password'=> bcrypt('admin')
                ],
                
                [
                    'nama'=> 'Pimpinan',
                    'email'=> 'pimpinan@gmail.com',
                    'level'=> 'Pimpinan',
                    'username'=> 'pimpinan',
                    'password'=> bcrypt('pimpinan')
                ]

            );

            admin::create([
                'id'=> '1',
                'user_id'=> '1',
                'nama'=> 'Admin',
                'email'=> 'admin@gmail.com', 
            ]);


            
            biaya::create([
                'harga'=> '1200000',
                'keterangan'=> 'Total Biaya', 
            ]);

    }
}

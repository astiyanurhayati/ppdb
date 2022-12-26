<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'nama_lengkap' => 'Siti Astiya Nurhayati',
            'email' =>'astiya@gmail.com',
            'password' => bcrypt('asti'),
            'role' => 'admin',
        ]);



        User::create([

            'nisn' => '12108773',
            'jk' => 'wanita',
            'nama_lengkap' => 'Siti Novi Nurkomala',
            'asal_sekolah' => 'SMP Negeri 2 Megamendung', 
            'email'=> 'novi@gmail.com',
           'password' => bcrypt('12108773'),
            'no_phone' => '0909090909',
            'no_phone_ayah' => '0909090909',
            'no_phone_ibu' => '0909090909',
            'role' => 'user'
        ]);
      
    }
}

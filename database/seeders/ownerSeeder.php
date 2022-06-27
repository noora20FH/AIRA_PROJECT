<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class ownerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
            'name' => 'Nuril',
            'email'=> 'nuril@gmail.com',
            'password'=> Hash::make('nuril123'),
            'role_as'=> 2,

        ]);
        DB::table('users')->insert([
            
            'name' => 'Liliana',
            'email'=> 'liliana@gmail.com',
            'password'=> Hash::make('liliana123'),
            'role_as'=> 2,

        ]);
    }
}

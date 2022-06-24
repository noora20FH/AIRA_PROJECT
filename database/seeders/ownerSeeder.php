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
            
            'name' => 'Sheeran',
            'email'=> 'sheeran@gmail.com',
            'password'=> Hash::make('sheeran123'),
            'role_as'=> 2,

        ]);
    }
}

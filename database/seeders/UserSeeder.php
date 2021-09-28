<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        User::create([
            'name'=>'admin',
            'password'=>'admin1',
            'age'=>'34',
            'isAdmin'=>true,
            'gender'=>'Male',
            'willing'=>'Yes',
            'imagePath'=>''
        ]);
    }
}

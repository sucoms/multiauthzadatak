<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
			'name' => 'Pero',
			'surname' => 'Perić',
            'email' => 'pero@test.com',
            'phone' => '03123456798',
			'password' => bcrypt('123456789')
        ]);
        
        User::create([
			'name' => 'Zvonko',
			'surname' => 'Zvonimirović',
            'email' => 'zvonko@test.com',
            'phone' => '03123456798',
			'password' => bcrypt('123456789'),
        ]);
        
        User::create([
			'name' => 'Zdenko',
			'surname' => 'Zdenković',
            'email' => 'zdenko@test.com',
            'phone' => '03123456798',
			'password' => bcrypt('123456789'),
        ]);
        
        User::create([
			'name' => 'Ivica',
			'surname' => 'Ivković',
            'email' => 'ivica@test.com',
            'phone' => '03123456798',
			'password' => bcrypt('123456789'),
        ]);    
    }
}

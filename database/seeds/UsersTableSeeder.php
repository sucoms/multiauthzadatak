<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r = Role::find(1);
        $r2 = Role::find(2);
        $user = User::create([
            'name' => 'Pero',
            'surname' => 'Perić',
            'email' => 'pero@test.com',
            'phone' => '03123456798',
            'password' => '123456789'
        ]);
        $user->roles()->attach($r);

        $user2 = User::create([
            'name' => 'Zvonko',
            'surname' => 'Zvonimirović',
            'email' => 'zvonko@test.com',
            'phone' => '03123456798',
            'password' => '123456789',
        ]);
        $user2->roles()->attach($r2);

        $user3 = User::create([
            'name' => 'Zdenko',
            'surname' => 'Zdenković',
            'email' => 'zdenko@test.com',
            'phone' => '03123456798',
            'password' => '123456789',
        ]);
        $user3->roles()->attach($r2);

        $user4 = User::create([
            'name' => 'Ivica',
            'surname' => 'Ivković',
            'email' => 'ivica@test.com',
            'phone' => '03123456798',
            'password' => '123456789',
        ]);
        $user4->roles()->attach($r2);
    }
}

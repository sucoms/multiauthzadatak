<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
			'name' => 'Filip',
			'surname' => 'Filipović',
            'email' => 'filip@test.com',
            'phone' => '03123456798',
			'password' => bcrypt('123456789')
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::firstOrCreate(
                ['username' => "admin",
                    'password' => bcrypt("secret09721"),
                
				'is_admin'=>'1'],
            );
    }
}

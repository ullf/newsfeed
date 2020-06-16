<?php

use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publisher')->insert([
            'username' => 'Emma',
			'password' => '12345678',
        ]);
		DB::table('publisher')->insert([
            'username' => 'Olivia',
			'password' => '12345678',
        ]);
		DB::table('publisher')->insert([
            'username' => 'Ava',
			'password' => '12345678',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
	 insert into link(l_url,ranking) values ('www.theartnewspaper.com',0);
insert into link(l_url,ranking) values ('www.timeout.com',0);
insert into link(l_url,ranking) values ('www.absolutearts.com',0);
insert into link(l_url,ranking) values ('www.artsy.net',0);
insert into link(l_url,ranking) values ('www.yatzer.com',0);
insert into link(l_url,ranking) values ('www.ignant.com',0);
insert into link(l_url,ranking) values ('www.vice.com',0);
insert into link(l_url,ranking) values ('www.hyperallergic.com',0);
insert into link(l_url,ranking) values ('www.hookedblog.co.uk',0);
insert into link(l_url,ranking) values ('www.petapixel.com',0);
insert into link(l_url,ranking) values ('www.featureshoot.com',0);
     */
    public function run()
    {
        DB::table('link')->insert([
            'l_url' => 'www.theartnewspaper.com',
            'ranking' => 0,
        ]);
		DB::table('link')->insert([
            'l_url' => 'www.timeout.com',
            'ranking' => 0,
        ]);
		DB::table('link')->insert([
            'l_url' => 'www.absolutearts.com',
            'ranking' => 0,
        ]);
		DB::table('link')->insert([
            'l_url' => 'www.artsy.net',
            'ranking' => 0,
        ]);
		DB::table('link')->insert([
            'l_url' => 'www.yatzer.com',
            'ranking' => 0,
        ]);
		DB::table('link')->insert([
            'l_url' => 'www.ignant.com',
            'ranking' => 0,
        ]);
		DB::table('link')->insert([
            'l_url' => 'www.vice.com',
            'ranking' => 0,
        ]);
		DB::table('link')->insert([
            'l_url' => 'www.hyperallergic.com',
            'ranking' => 0,
        ]);
		DB::table('link')->insert([
            'l_url' => 'www.hookedblog.co.uk',
            'ranking' => 0,
        ]);
		DB::table('link')->insert([
            'l_url' => 'www.petapixel.com',
            'ranking' => 0,
        ]);
		DB::table('link')->insert([
            'l_url' => 'www.featureshoot.com',
            'ranking' => 0,
        ]);
    }
}

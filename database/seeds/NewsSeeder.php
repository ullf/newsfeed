<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
	 insert into news (title,news_text,news_category,l_url) values('The Texas-based philanthropist Alice Negley "Lisa" Dorn, has died at age 69.','Dorn comes from a long line of arts patrons','art','www.theartnewspaper.com');
insert into news (title,news_text,news_category,l_url) values('The best current and upcoming MoMA exhibits','the Museum of Modern Art (founded in 1929) has  shepherded cutting-edge movements such as Cubism','art','www.timeout.com');
insert into news (title,news_text,news_category,l_url) values('Important Art Historical Movements Related to Contemporary Paintings','The history of modern art begins with Impressionism','art','www.absolutearts.com');
insert into news (title,news_text,news_category,l_url) values('Contemporary Art','Spanning from 1970 to the present day,','art','www.artsy.net');
insert into news (title,news_text,news_category,l_url) values('A Castle-Like House in the Hollywood Hills Marries Luxury with Modesty','Nestled high above Los Angeles in the Hollywood hills, not far from the iconic Hollywood sign, this residence was conceived','art','www.yatzer.com');
insert into news (title,news_text,news_category,l_url) values('In Tokyo, A Giant Staircase
Cuts Through The Center
Of Nendo’s Stairway House','The home was designed for three generations of the same family','art','www.ignant.com');
insert into news (title,news_text,news_category,l_url) values('Bail Funds Are Being Flooded With Donations for George Floyd Protestors','With COVID-19 still ravaging vulnerable communities, bailing protesters out of jail has become a matter of life and death.
','covid','www.vice.com');
insert into news (title,news_text,news_category,l_url) values('Hong Kong Cultural Workers Say New Legislation Will Eliminate Creative Freedom','Over 1,500 people have signed a petition questioning “how much room would remain for free speech and artistic expression”','culture','www.hyperallergic.com');
     */
    public function run()
    {
        DB::table('news')->insert([
            'l_url' => 'www.theartnewspaper.com',
            'title'=>'The Texas-based philanthropist Alice Negley "Lisa" Dorn, has died at age 69.',
			'news_text'=>'Dorn comes from a long line of arts patrons',
			'news_category'=>'art',
			
        ]);
		DB::table('news')->insert([
            'l_url' => 'www.timeout.com',
            'title'=>'The best current and upcoming MoMA exhibits',
			'news_text'=>'the Museum of Modern Art (founded in 1929) has  shepherded cutting-edge movements such as Cubism',
			'news_category'=>'art',
        ]);
    }
}

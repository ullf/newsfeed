<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('news_text');
            $table->string('news_category');
			$table->string('l_url');
			$table->string('title');
        });
		
		Schema::table('news', function (Blueprint $table) {
			$table->foreign('l_url')->references('l_url')->on('link')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

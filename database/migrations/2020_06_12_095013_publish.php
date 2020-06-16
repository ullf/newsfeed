<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Publish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publish', function (Blueprint $table) {
				$table->id();
				$table->unsignedBigInteger('publisherid');
				$table->unsignedBigInteger('newsid')->default(0);
        });
		Schema::table('publish', function (Blueprint $table) {
			$table->foreign('publisherid')->references('id')->on('user');
			$table->foreign('newsid')->references('id')->on('news');
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

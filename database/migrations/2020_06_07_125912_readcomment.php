<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Readcomment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readcomment', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('commentid')->unsigned()->default(0);
				$table->bigInteger('userid')->unsigned()->default(0);
        });
		
		Schema::table('readcomment', function (Blueprint $table) {
			$table->foreign('commentid')->references('id')->on('comment')->onDelete('cascade');
			$table->foreign('userid')->references('id')->on('user');
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

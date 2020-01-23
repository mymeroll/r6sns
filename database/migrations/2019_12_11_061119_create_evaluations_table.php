<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('evaluation_id');
            $table->unsignedInteger('evaluationed_id');
			$table->unsignedInteger('evaluation');
			$table->foreign('evaluation_id')->references('id')->on('users');
			$table->foreign('evaluationed_id')->references('id')->on('users');
			$table->timestamps();		
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}

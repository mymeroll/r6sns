<?php
 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('message_connection_id')->unsigned();
            $table->integer('send_user_id')->unsigned();
			$table->integer('reply_user_id')->unsigned();
            $table->text('content');
			$table->foreign('send_user_id')->references('id')->on('users');
			$table->foreign('reply_user_id')->references('id')->on('users');
			$table->foreign('message_connection_id')->references('id')->on('connections');
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
        Schema::dropIfExists('messages');
    }
}
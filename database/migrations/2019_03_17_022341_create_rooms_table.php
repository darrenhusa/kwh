<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            // $table->bigIncrements('id'); // default pk
            $table->unsignedinteger('room_no')->primary(); //pk
            $table->string('category'); //fk
            $table->foreign('category')->references('category')->on('room_categories');
            // $table->foreign('category')->references('category')->on('room_categories')->onDelete('cascade');

            $table->boolean('unavailable');
            $table->boolean('needs_cleaning');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}

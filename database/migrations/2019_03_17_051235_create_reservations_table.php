<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            // $table->bigIncrements('id');

            $table->bigIncrements('reservation_no');
            $table->unsignedInteger('room_no')->nullable();
            $table->foreign('room_no')->references('room_no')->on('rooms');
            // $table->foreign('room_no')->references('room_no')->on('rooms')->onDelete('cascade');
            $table->unsignedBigInteger('customer_no')->nullable();
            $table->foreign('customer_no')->references('id')->on('customers');
            // $table->foreign('customer_no')->references('id')->on('customers')->onDelete('cascade');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->decimal('amount');

            $table->timestamps();
        });

        // Schema::table('reservations', function (Blueprint $table) {
        //     $table->foreign('room_no')->references('room_no')->on('rooms')->onDelete('cascade');
        //     $table->foreign('customer_no')->references('id')->on('customers')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}

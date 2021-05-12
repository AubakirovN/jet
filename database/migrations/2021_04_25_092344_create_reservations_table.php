<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('flight_id')->unsigned();
            $table->integer('user_id');
            $table->integer('count_place');
            $table->string('status');
            $table->longText('comment')->nullable();           
            $table->timestamps();
        });

   //      Schema::table('reservations', function($table) {
   //     $table->foreign('flight_id')->references('id')->on('wordpress.wp_pods_trip')->onDelete('CASCADE');;
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

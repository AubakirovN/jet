<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_requests', function (Blueprint $table) {
            $table->id();
            $table->string('departure_city');
            $table->string('name')->nullable();
            $table->string('arrival_city')->nullable();
            $table->boolean('one_way')->nullable();
            $table->date('departure_date');
            $table->date('arrival_date')->nullable();
            $table->integer('count_place');
            $table->string('email');
            $table->string('status');
            $table->longText('result_comment')->nullable();
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
        Schema::dropIfExists('flight_requests');
    }
}

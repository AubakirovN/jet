<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('plane');
            $table->string('departure_city');
            $table->string('arrival_city');
            $table->string('departure_date');
            $table->string('flight_duration');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            Schema::dropColumn('plane');
            Schema::dropColumn('departure_city');
            Schema::dropColumn('arrival_city');
            Schema::dropColumn('departure_date');
            Schema::dropColumn('flight_duration');
        });
    }
}

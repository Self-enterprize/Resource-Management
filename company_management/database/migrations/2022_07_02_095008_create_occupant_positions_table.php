<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupantPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupant_positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('occupant_id');
            $table->unsignedBigInteger('position_id');
            $table->timestamp('starting_date');
            $table->timestamp('ending_date')->nullable();
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
        Schema::dropIfExists('occupant_positions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrimmingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trimmings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('h_no');
            $table->string('maker');
            $table->string('surface');
            $table->string('model');
            $table->string('material');
            $table->string('plate_thickness');
            $table->string('number_of_sheets');
            $table->text('supplement')->nullable();

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
        Schema::dropIfExists('trimmings');
    }
}

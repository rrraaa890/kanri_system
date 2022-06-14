<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presses', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('h_no');
            $table->string('maker');
            $table->string('surface');
            $table->string('model');
            $table->string('material');
            $table->string('plate_thickness');
            $table->string('good');
            $table->string('bad')->nullable();
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
        Schema::dropIfExists('presses');
    }
}

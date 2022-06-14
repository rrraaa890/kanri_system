<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coils', function (Blueprint $table) {
            $table->bigIncrements('id');

            
            $table->string('h_no');            $table->string('maker');
            $table->string('surface');
            $table->string('material');
            $table->string('plate_thickness');
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
        Schema::dropIfExists('coils');
    }
}

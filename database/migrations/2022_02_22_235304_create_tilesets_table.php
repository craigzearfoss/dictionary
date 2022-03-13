<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTilesetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tile_sets', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 20)->nullable(false);
            $table->unsignedBigInteger('language_id')->nullable(true);
            $table->integer('num_tiles')->default(0);
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tile_sets');
    }
}

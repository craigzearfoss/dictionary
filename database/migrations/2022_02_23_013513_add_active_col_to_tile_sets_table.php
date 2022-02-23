<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActiveColToTileSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tile_sets', function (Blueprint $table) {
            $table->tinyInteger('active')->nullable(false)->default(1)->after('num_tiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tile_sets', function (Blueprint $table) {
            //
        });
    }
}

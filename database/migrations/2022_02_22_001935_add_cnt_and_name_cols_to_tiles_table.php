<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCntAndNameColsToTilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tiles', function (Blueprint $table) {
            $table->integer('cnt')->nullable(true)->after('char_case');
        });

        Schema::table('tiles', function (Blueprint $table) {
            $table->string('name', 50)->nullable(true)->after('cnt');
        });

        Schema::table('tiles', function (Blueprint $table) {
            $table->string('description', 255)->nullable(true)->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tiles', function (Blueprint $table) {
            //
        });
    }
}

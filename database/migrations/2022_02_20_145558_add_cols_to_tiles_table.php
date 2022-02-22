<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToTilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tiles', function (Blueprint $table) {
            $table->integer('dec')->nullable(true)->after('case');
        });

        Schema::table('tiles', function (Blueprint $table) {
            $table->string('oct', 3)->nullable(true)->after('dec');
        });

        Schema::table('tiles', function (Blueprint $table) {
            $table->string('hex', 2)->nullable(true)->after('oct');
        });

        Schema::table('tiles', function (Blueprint $table) {
            $table->string('bin', 8)->nullable(true)->after('hex');
        });

        Schema::table('tiles', function (Blueprint $table) {
            $table->string('html_number', 6)->nullable(true)->after('bin');
        });

        Schema::table('tiles', function (Blueprint $table) {
            $table->string('html_name', 10)->nullable(true)->after('html_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

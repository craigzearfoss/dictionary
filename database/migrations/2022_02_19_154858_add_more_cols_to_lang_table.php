<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColsToLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('languages', function (Blueprint $table) {
            $table->string('family', 20)->nullable(true)->after('native_speakers');
        });

        Schema::table('languages', function (Blueprint $table) {
            $table->string('code6391', 2)->nullable(true)->after('family');
        });

        Schema::table('languages', function (Blueprint $table) {
            $table->string('code6392t', 3)->nullable(true)->after('code6391');
        });

        Schema::table('languages', function (Blueprint $table) {
            $table->string('code6392b', 3)->nullable(true)->after('code6392t');
        });

        Schema::table('languages', function (Blueprint $table) {
            $table->string('code6393', 3)->nullable(true)->after('code6392b');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('languages', function (Blueprint $table) {
            //
        });
    }
}

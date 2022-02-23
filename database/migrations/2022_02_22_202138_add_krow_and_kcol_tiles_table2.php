<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKrowAndKcolTilesTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tiles', function (Blueprint $table) {
            $table->integer('krow')->nullable(false)->default(0)->after('seq');
        });

        Schema::table('tiles', function (Blueprint $table) {
            $table->integer('kcol')->nullable(false)->default(0)->after('krow');
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

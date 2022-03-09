<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrimaryColToLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('langs', function (Blueprint $table) {
            $table->tinyInteger('primary')->nullable(false)->default(1)->after('id');
        });

        Schema::table('langs', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable(true)->after('primary');
            $table->foreign('parent_id')->references('id')->on('langs')->onDelete('cascade');
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

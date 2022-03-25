<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLanguageIdToArticleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('definite_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('language_id')->default(1)->after('id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        }) ;

        Schema::table('indefinite_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('language_id')->default(1)->after('id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}

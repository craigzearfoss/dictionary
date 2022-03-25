<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleFieldIndexToArticleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('definite_articles', function (Blueprint $table) {
            $table->unique(['name', 'language_id', 'gender_id']);
        }) ;

        Schema::table('indefinite_articles', function (Blueprint $table) {
            $table->unique(['name', 'language_id', 'gender_id']);
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

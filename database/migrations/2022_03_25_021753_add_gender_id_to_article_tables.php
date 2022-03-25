<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderIdToArticleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('definite_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('gender_id')->default(1)->after('name');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        }) ;

        Schema::table('indefinite_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('gender_id')->default(1)->after('name');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
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

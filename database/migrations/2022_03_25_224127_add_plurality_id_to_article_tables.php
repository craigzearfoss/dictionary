<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPluralityIdToArticleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('definite_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('plurality_id')->default(1)->after('gender_id');
            $table->foreign('plurality_id')->references('id')->on('pluralities')->onDelete('cascade');
        }) ;

        Schema::table('indefinite_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('plurality_id')->default(1)->after('gender_id');
            $table->foreign('plurality_id')->references('id')->on('pluralities')->onDelete('cascade');
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

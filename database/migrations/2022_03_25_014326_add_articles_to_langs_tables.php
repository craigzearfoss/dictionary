<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArticlesToLangsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lang_ar', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_ar', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('langs_tables', function (Blueprint $table) {
            //
        });
    }
}

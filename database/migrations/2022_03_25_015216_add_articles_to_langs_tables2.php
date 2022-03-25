<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArticlesToLangsTables2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lang_cs', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_cs', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_da', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_da', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_de', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_de', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_el', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_el', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_es', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_es', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_fi', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_fi', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_fr', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_fr', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_he', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_he', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_hr', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_hr', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_it', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_it', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_ja', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_ja', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_ko', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_ko', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_la', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_la', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_nl', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_nl', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_no', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_no', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_pl', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_pl', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_pt', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_pt', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_ro', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_ro', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_ru', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_ru', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_sv', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_sv', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_th', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_th', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_tr', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_tr', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_uk', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_uk', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_vi', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_vi', function (Blueprint $table) {
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->after('definite_article_id');
            $table->foreign('indefinite_article_id')->references('id')->on('indefinite_articles')->onDelete('cascade');
        }) ;

        Schema::table('lang_zh', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
        }) ;
        Schema::table('lang_zh', function (Blueprint $table) {
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
        Schema::table('langs_tables2', function (Blueprint $table) {
            //
        });
    }
}

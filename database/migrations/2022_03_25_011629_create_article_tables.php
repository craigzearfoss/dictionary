<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateArticleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definite_articles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10)->nullable(false);
            $table->timestamps();
        });

        Schema::create('indefinite_articles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10)->nullable(false);
            $table->timestamps();
        });

        DB::table('definite_articles')->insert([ 'id' => 1, 'name' => '' ]);
        DB::table('indefinite_articles')->insert([ 'id' => 1, 'name' => '' ]);


        Schema::table('lang_en', function (Blueprint $table) {
            $table->unsignedBigInteger('definite_article_id')->default(1)->after('word');
            $table->unsignedBigInteger('indefinite_article_id')->default(1)->before('gender_id');
            $table->foreign('definite_article_id')->references('id')->on('definite_articles')->onDelete('cascade');
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
        Schema::dropIfExists('indefinite_articles');
        Schema::dropIfExists('definite_articles');
    }
}

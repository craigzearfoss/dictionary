<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_tense', function (Blueprint $table) {
            $table->unsignedBigInteger('language_id')->nullable(false);
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->unsignedBigInteger('tense_id')->nullable(false);
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_tenses');
    }
}

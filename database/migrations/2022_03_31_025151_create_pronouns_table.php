<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePronounsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pronouns', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->tinyInteger('person')->nullable(true);
            $table->string('plurality', 1)->nullable(true);
            $table->string('gender', 1)->nullable(true);
        });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pronouns');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitializeThwordplays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thwordplays', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('subject', 50)->nullable(false);
            $table->string('title', 255)->nullable(true);
            $table->string('description', 255)->nullable(true);
            $table->unsignedBigInteger('lang_id')->default(1);
            $table->unsignedBigInteger('category_id')->default(1);
            $table->unsignedBigInteger('grade_id')->default(1);
            $table->text('synonyms')->nullable(false);
            $table->text('antonyms')->nullable(true);
            $table->json('terms');
            $table->text('matches')->nullable(true);
            $table->json('questions');
            $table->tinyInteger('active')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('subject');
            $table->index('title');
            $table->foreign('lang_id')->references('id')->on('langs')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thwordplays');
    }
}

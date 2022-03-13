<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitializeDictionary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 20)->nullable(false)->unique();
            $table->timestamps();
            $table->index('name');
        });

        Schema::create('categories', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 50)->nullable(false)->unique();
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->index('name');
        });

        Schema::create('grades', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 50)->nullable(false)->unique();
            $table->integer('level')->nullable(false)->unique();
            $table->timestamps();
            $table->index('name');
        });

        Schema::create('tags', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 50)->nullable(false)->unique();
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->index('name');
        });

        Schema::create('collins_tags', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 50)->nullable(false)->unique();
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->index('name');
        });

        Schema::create('languages', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('abbrev', 10)->nullable(false)->unique();
            $table->string('short', 50)->nullable(false)->unique();
            $table->string('full', 100)->nullable(false)->unique();
            $table->string('code', 10)->nullable(false);
            $table->string('name', 50)->nullable(false);
            $table->string('directionality', 3)->nullable(false);
            $table->string('local', 100)->nullable(false);
            $table->string('wiki', 50)->nullable(false);
            $table->index('abbrev');
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('full');
        });

        Schema::create('terms', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('term', 100)->nullable(false);
            $table->string('definition', 255)->nullable(true);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('pos_id')->default(1);
            $table->unsignedBigInteger('category_id')->default(1);
            $table->unsignedBigInteger('grade_id')->default(1);
            $table->string('pos_text', 50)->nullable(true);
            $table->string('collins_tag', 50)->nullable(true);
            $table->string('collins_def', 255)->nullable(true);
            $table->string('en_us', 100)->nullable(true)->default(null);
            $table->string('pron_en_us', 100)->nullable(true)->default(null);
            $table->string('en_uk', 100)->nullable(true)->default(null);
            $table->string('pron_en_uk', 100)->nullable(true)->default(null);
            $table->string('ar', 100)->nullable(true)->default(null);
            $table->string('cs', 100)->nullable(true)->default(null);
            $table->string('da', 100)->nullable(true)->default(null);
            $table->string('de', 100)->nullable(true)->default(null);
            $table->string('el', 100)->nullable(true)->default(null);
            $table->string('es_es', 100)->nullable(true)->default(null);
            $table->string('es_la', 100)->nullable(true)->default(null);
            $table->string('fi', 100)->nullable(true)->default(null);
            $table->string('fr', 100)->nullable(true)->default(null);
            $table->string('hr', 100)->nullable(true)->default(null);
            $table->string('it', 100)->nullable(true)->default(null);
            $table->string('ja', 100)->nullable(true)->default(null);
            $table->string('ko', 100)->nullable(true)->default(null);
            $table->string('nl', 100)->nullable(true)->default(null);
            $table->string('no', 100)->nullable(true)->default(null);
            $table->string('pl', 100)->nullable(true)->default(null);
            $table->string('pt_br', 100)->nullable(true)->default(null);
            $table->string('pt_pt', 100)->nullable(true)->default(null);
            $table->string('ro', 100)->nullable(true)->default(null);
            $table->string('ru', 100)->nullable(true)->default(null);
            $table->string('sv', 100)->nullable(true)->default(null);
            $table->string('th', 100)->nullable(true)->default(null);
            $table->string('tr', 100)->nullable(true)->default(null);
            $table->string('uk', 100)->nullable(true)->default(null);
            $table->string('vi', 100)->nullable(true)->default(null);
            $table->string('zh', 100)->nullable(true)->default(null);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->index('en_us');
            $table->index('en_uk');
            $table->foreign('pos_id')->references('id')->on('pos')->onDelete('cascade');
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
        Schema::dropIfExists('terms');
        Schema::dropIfExists('langs');
        Schema::dropIfExists('collins_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('grades');
        Schema::dropIfExists('pos');
    }
}

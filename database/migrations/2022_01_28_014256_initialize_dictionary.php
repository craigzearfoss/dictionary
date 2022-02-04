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
        Schema::create('categories', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 50)->nullable(false)->unique();
        });

        Schema::create('langs', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('abbrev', 10)->nullable(false)->unique();
            $table->string('short', 50)->nullable(false)->unique();
            $table->string('full', 100)->nullable(false)->unique();
            $table->string('code', 10)->nullable(false);
            $table->string('name', 50)->nullable(false);
            $table->string('directionality', 3)->nullable(false);
            $table->string('local', 100)->nullable(false);
            $table->string('wiki', 50)->nullable(false);
        });

        Schema::create('terms', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('term', 100)->nullable(false);
            $table->string('definition', 255)->nullable(true);
            $table->string('pos_text', 50)->nullable(true);
            $table->string('category_text', 50)->nullable(true);
            $table->string('sentence', 255)->nullable(true);
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
            $table->timestamps();
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
        Schema::dropIfExists('categories');
    }
}

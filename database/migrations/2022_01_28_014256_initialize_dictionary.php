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
            $table->string('term')->nullable(false);
            $table->string('definition')->nullable(true);
            $table->string('sentence')->nullable(true);
            $table->string('en_us')->nullable(true)->default(null);
            $table->string('en_uk')->nullable(true)->default(null);
            $table->string('ar')->nullable(true)->default(null);
            $table->string('cs')->nullable(true)->default(null);
            $table->string('da')->nullable(true)->default(null);
            $table->string('de')->nullable(true)->default(null);
            $table->string('el')->nullable(true)->default(null);
            $table->string('es_es')->nullable(true)->default(null);
            $table->string('es_la')->nullable(true)->default(null);
            $table->string('fi')->nullable(true)->default(null);
            $table->string('fr')->nullable(true)->default(null);
            $table->string('hr')->nullable(true)->default(null);
            $table->string('it')->nullable(true)->default(null);
            $table->string('ja')->nullable(true)->default(null);
            $table->string('ko')->nullable(true)->default(null);
            $table->string('nl')->nullable(true)->default(null);
            $table->string('no')->nullable(true)->default(null);
            $table->string('pl')->nullable(true)->default(null);
            $table->string('pt_br')->nullable(true)->default(null);
            $table->string('pt_pt')->nullable(true)->default(null);
            $table->string('ro')->nullable(true)->default(null);
            $table->string('ru')->nullable(true)->default(null);
            $table->string('sv')->nullable(true)->default(null);
            $table->string('th')->nullable(true)->default(null);
            $table->string('tr')->nullable(true)->default(null);
            $table->string('uk')->nullable(true)->default(null);
            $table->string('vi')->nullable(true)->default(null);
            $table->string('zh')->nullable(true)->default(null);
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
    }
}

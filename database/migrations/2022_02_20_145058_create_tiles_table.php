<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiles', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('lang_id')->default(1);
            $table->string('symbol', 1)->nullable(false);
            $table->string('base_symbol', 1)->nullable(false);
            $table->enum('case', ['upper', 'lower', 'none'])->default('none');
            $table->integer('value')->nullable(false);
            $table->foreign('lang_id')->references('id')->on('langs')->onDelete('cascade');
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tiles', function (Blueprint $table) {
            Schema::dropIfExists('tiles');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TermTodos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_todos', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('term', 100)->nullable(false);
            $table->tinyInteger('processed')->nullable(false)->default(0);
            $table->text('notes')->nullable(true);
            $table->unsignedBigInteger('lang_id')->default(1);
            $table->timestamps();
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
        Schema::dropIfExists('term_todos');
    }
}

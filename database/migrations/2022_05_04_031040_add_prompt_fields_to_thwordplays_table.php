<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPromptFieldsToThwordplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thwordplays', function (Blueprint $table) {
            $table->unsignedBigInteger('base_id')->default(7)->after('subject');
            $table->foreign('thwordplay_base_id')->references('id')->on('thwordplay_bases')->onDelete('cascade');
        });
        Schema::table('thwordplays', function (Blueprint $table) {
            $table->string('prompt', 20)->nullable(true)->after('base_id');
        });
        Schema::table('thwordplays', function (Blueprint $table) {
            $table->string('prompt2', 20)->nullable(true)->after('prompt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thwordplay', function (Blueprint $table) {
            //
        });
    }
}

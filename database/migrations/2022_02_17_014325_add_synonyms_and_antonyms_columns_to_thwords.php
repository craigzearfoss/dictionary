<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSynonymsAndAntonymsColumnsToThwords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thwords', function (Blueprint $table) {
            $table->renameColumn('game', 'synonyms');
        });

        Schema::table('thwords', function (Blueprint $table) {
            $table->after('synonyms', function ($table) {
                $table->json('antonyms');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thwords', function (Blueprint $table) {
            $table->removeColumn('antonyms');
            $table->renameColumn('synonyms', 'game');
        });
    }
}

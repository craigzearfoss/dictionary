<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTermsColumnToThwordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thwords', function (Blueprint $table) {
            $table->text('synonyms')->nullable(false)->change();
            $table->text('antonyms')->nullable(true)->change();
            $table->after('antonyms', function ($table) {
                $table->json('terms');
            });
        });

        Schema::table('term_todos', function (Blueprint $table) {
            $table->after('processed_at', function ($table) {
                $table->tinyInteger('skipped')->nullable(false)->default(0);
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
            //
        });
    }
}

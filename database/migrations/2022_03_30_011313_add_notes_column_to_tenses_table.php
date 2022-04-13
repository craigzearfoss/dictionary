<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNotesColumnToTensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('language_tenses', function (Blueprint $table) {
            $table->unique(['language_id', 'tense_id']);
        }) ;

        Schema::table('tenses', function (Blueprint $table) {
            $table->text('notes')->after('structure');
            $table->tinyInteger('simple')->nullable(false)->default(0)->after('tense');
            $table->tinyInteger('imperfect')->nullable(false)->default(0)->after('perfect');
        });

        Schema::table('tenses', function (Blueprint $table) {
            $table->tinyInteger('indicative')->nullable(false)->default(0)->after('imperfect');
        });

        Schema::table('tenses', function (Blueprint $table) {
            $table->tinyInteger('imperative')->nullable(false)->default(0)->after('indicative');
        });

        Schema::table('tenses', function (Blueprint $table) {
            $table->tinyInteger('progressive')->nullable(false)->default(0)->after('imperative');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenses', function (Blueprint $table) {
            //
        });
    }
}

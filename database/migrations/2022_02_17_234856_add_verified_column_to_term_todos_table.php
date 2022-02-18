<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifiedColumnToTermTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('term_todos', function (Blueprint $table) {
            $table->after('skipped', function ($table) {
                $table->timestamp('skipped_at')->nullable(true);
            });
        });

        Schema::table('term_todos', function (Blueprint $table) {
            $table->after('skipped_at', function ($table) {
                $table->tinyInteger('verified')->nullable(false)->default(0);
                $table->timestamp('verified_at')->nullable(true);
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

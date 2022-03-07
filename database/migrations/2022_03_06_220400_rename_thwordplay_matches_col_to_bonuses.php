<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameThwordplayMatchesColToBonuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thwordplays', function (Blueprint $table) {
            $table->renameColumn('matches', 'bonuses');
        });

        Schema::table('thwordplays', function (Blueprint $table) {
            $table->json('bonuses')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thwordplays');
    }
}

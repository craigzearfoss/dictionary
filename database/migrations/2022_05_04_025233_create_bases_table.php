<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thwordplay_bases', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->nullable(false);
        });

        DB::table('thwordplay_bases')->insert([
            'id'          => 1,
            'name'        => 'Art & Literature'
        ]);
        DB::table('thwordplay_bases')->insert([
            'id'          => 2,
            'name'        => 'Entertainment'
        ]);
        DB::table('thwordplay_bases')->insert([
            'id'          => 3,
            'name'        => 'Geography'
        ]);
        DB::table('thwordplay_bases')->insert([
            'id'          => 4,
            'name'        => 'History'
        ]);
        DB::table('thwordplay_bases')->insert([
            'id'          => 5,
            'name'        => 'Science & Nature'
        ]);
        DB::table('thwordplay_bases')->insert([
            'id'          => 6,
            'name'        => 'Sports & Leisure'
        ]);
        DB::table('thwordplay_bases')->insert([
            'id'          => 7,
            'name'        => 'Wild Card'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thwordplay_bases');
    }
}

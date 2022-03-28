<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10)->nullable(false);
            $table->string('role', 50)->nullable(true);
            $table->string('description', 50)->nullable(true);
        });

        DB::table('cases')->insert([
            'id'          => 1,
            'name'        => '',
            'role'        => '',
            'description' => ''
        ]);
        DB::table('cases')->insert([
            'id'          => 2,
            'name'        => 'nominative',
            'role'        => 'subject',
            'description' => 'takes action'
        ]);
        DB::table('cases')->insert([
            'id'          => 3,
            'name'        => 'accusative',
            'role'        => 'direct object',
            'description' => 'receives action'
        ]);
        DB::table('cases')->insert([
            'id'          => 4,
            'name'        => 'dative',
            'role'        => 'indirect object',
            'description' => 'to/for whom action is taken'
        ]);
        DB::table('cases')->insert([
            'id'          => 5,
            'name'        => 'genitive',
            'role'        => 'possessive',
            'description' => 'indicates owner of someone/something'
        ]);

        Schema::table('definite_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('case_id')->default(1)->after('plurality_id');
            $table->foreign('case_id')->references('id')->on('cases')->onDelete('cascade');
        }) ;

        Schema::table('indefinite_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('case_id')->default(1)->after('plurality_id');
            $table->foreign('case_id')->references('id')->on('cases')->onDelete('cascade');
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases');
    }
}

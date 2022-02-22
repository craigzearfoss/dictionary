<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charsets', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 50)->nullable(false);
            $table->string('description', 255)->nullable(true);
            $table->string('script_type', 10)->nullable(true);
            $table->string('iso15924', 10)->nullable(true);
            $table->string('unicode', 10)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charsets');
    }
}

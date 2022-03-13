<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameEnabledColumnsToActive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->renameColumn('enabled', 'active');
        });

        Schema::table('collins_tags', function (Blueprint $table) {
            $table->renameColumn('enabled', 'active');
        });

        Schema::table('languages', function (Blueprint $table) {
            $table->renameColumn('enabled', 'active');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->renameColumn('enabled', 'active');
        });

        Schema::table('terms', function (Blueprint $table) {
            $table->renameColumn('enabled', 'active');
        });

        Schema::table('thwords', function (Blueprint $table) {
            $table->renameColumn('enabled', 'active');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('enabled', 'active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('active', 'enabled');
        });

        Schema::table('thwords', function (Blueprint $table) {
            $table->renameColumn('active', 'enabled');
        });

        Schema::table('terms', function (Blueprint $table) {
            $table->renameColumn('active', 'enabled');
        });

        Schema::table('tags', function (Blueprint $table) {
            $table->renameColumn('active', 'enabled');
        });

        Schema::table('languages', function (Blueprint $table) {
            $table->renameColumn('active', 'enabled');
        });

        Schema::table('collins_tags', function (Blueprint $table) {
            $table->renameColumn('active', 'enabled');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->renameColumn('active', 'enabled');
        });
    }
}

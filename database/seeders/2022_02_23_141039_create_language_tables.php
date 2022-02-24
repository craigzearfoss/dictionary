<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lang_en_us', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_en_uk', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_ar', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_cs', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_da', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_de', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_el', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_es_es', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_es_el', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_fi', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_fr', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_hr', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_it', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_ja', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_ko', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_nl', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_no', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_pl', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_pt_br', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_pt_pt', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_ro', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_ru', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_sv', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_th', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_tr', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_vi', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

        Schema::create('lang_zh', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('determiner', 10)->nullable(false);
            $table->string('term', 100)->nullable(false);
            $table->string('sentence', 255)->nullable(true);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->tinyInteger('enabled')->nullable(false)->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index('term');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_tables');
    }
}

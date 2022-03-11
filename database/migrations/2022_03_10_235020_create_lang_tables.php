<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLangTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('genders', function (Blueprint $table) {
            $table->string('abbrev', 1)->nullable(false)->after('name');
        });

        Schema::create('pluralities', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 20)->nullable(false);
            $table->index('name');
        });

        DB::table('pluralities')->insert([ 'name' => '' ]);
        DB::table('pluralities')->insert([ 'name' => 'singular' ]);
        DB::table('pluralities')->insert([ 'name' => 'plural' ]);
        DB::table('pluralities')->insert([ 'name' => 'uncountable' ]);

        Schema::create('tenses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 250)->nullable(false);
            $table->string('abbrev', 10)->nullable(false);
            $table->string('structure', 100)->nullable(false);
            $table->string('example1', 100)->nullable(false);
            $table->string('example2', 100)->nullable(false);
            $table->enum('tense', ['n/a', 'past', 'present', 'future', 'past future']);
            $table->tinyInteger('continuous')->nullable(false)->default(0);
            $table->tinyInteger('perfect')->nullable(false)->default(0);
            $table->index('name');
        });

        DB::table('tenses')->insert([
            'id' => 1,
            'name' => '',
            'abbrev' => '',
            'structure' => '',
            'example1' => '',
            'example2' => '',
            'tense' => 'n/a',
            'continuous' => 0,
            'perfect' => 0
        ]);
        DB::table('tenses')->insert([
            'id' => 2,
            'name' => 'Simple Present Tense',
            'abbrev' => 'present',
            'structure' => 'Subject + Verb (vI) + es/es',
            'example1' => 'I take exercise daily.',
            'example2' => 'She reads a book in the library.',
            'tense' => 'present',
            'continuous' => 0,
            'perfect' => 0
        ]);
        DB::table('tenses')->insert([
            'id' => 3,
            'name' => 'Present Continuous Tense',
            'abbrev' => '',
            'structure' => 'Subject + is/am/are + Verb(+ing)',
            'example1' => 'He is playing football.',
            'example2' => 'I am studying in a high school.',
            'tense' => 'present',
            'continuous' => 1,
            'perfect' => 0
        ]);
        DB::table('tenses')->insert([
            'id' => 4,
            'name' => 'Present Perfect Tense',
            'abbrev' => '',
            'structure' => 'Subject + Has/have + Verb (v3)',
            'example1' => 'He has made this colorful chart.',
            'example2' => 'I have completed my assignment.',
            'tense' => 'present',
            'continuous' => 0,
            'perfect' => 1
        ]);
        DB::table('tenses')->insert([
            'id' => 5,
            'name' => 'Present Perfect Continuous Tense',
            'abbrev' => '',
            'structure' => 'Subject + Has/have + been + Verb(+ing)',
            'example1' => 'I have been completing my assignment for the last three days.',
            'example2' => 'She has been working in this department since 2017.',
            'tense' => 'present',
            'continuous' => 1,
            'perfect' => 1
        ]);
        DB::table('tenses')->insert([
            'id' => 6,
            'name' => 'Simple Past Tense',
            'abbrev' => '',
            'structure' => 'Subject + Verb (v2) or irregular verb:',
            'example1' => 'He completed the assignment.',
            'example2' => 'I read the newspaper.',
            'tense' => 'past',
            'continuous' => 0,
            'perfect' => 0
        ]);
        DB::table('tenses')->insert([
            'id' => 7,
            'name' => 'Past Continuous Tense',
            'abbrev' => '',
            'structure' => 'Subject + was/were + Verb(+ing)',
            'example1' => 'He was reading the book.',
            'example2' => 'I was going to the park for a morning walk.',
            'tense' => 'past',
            'continuous' => 1,
            'perfect' => 0
        ]);
        DB::table('tenses')->insert([
            'id' => 8,
            'name' => 'Past Perfect Tense',
            'abbrev' => '',
            'structure' => 'Subject + had + Verb (v3)',
            'example1' => 'I had finished my homework.',
            'example2' => 'He had completed his task.',
            'tense' => 'past',
            'continuous' => 0,
            'perfect' => 1
        ]);
        DB::table('tenses')->insert([
            'id' => 9,
            'name' => 'Past Perfect Continuous Tense',
            'abbrev' => '',
            'structure' => 'Subject + had + been + Verb(+ing)',
            'example1' => 'He had been completing his assignment for the last two hours.',
            'example2' => 'I had been playing football since morning.',
            'tense' => 'past',
            'continuous' => 1,
            'perfect' => 1
        ]);
        DB::table('tenses')->insert([
            'id' => 10,
            'name' => 'Simple Future Tense',
            'abbrev' => '',
            'structure' => 'Subject+ will/shall+ verb(v1)',
            'example1' => 'I shall go to the park for a walk.',
            'example2' => 'She will perform his duty.',
            'tense' => 'future',
            'continuous' => 0,
            'perfect' => 0
        ]);
        DB::table('tenses')->insert([
            'id' => 11,
            'name' => 'Future Continuous Tense',
            'abbrev' => '',
            'structure' => 'Subject + will be/shall be + verb(+ing)',
            'example1' => 'He will be playing football.',
            'example2' => 'We shall be eating the meal.',
            'tense' => 'future',
            'continuous' => 1,
            'perfect' => 0
        ]);
        DB::table('tenses')->insert([
            'id' => 12,
            'name' => 'Future Perfect Tense',
            'abbrev' => '',
            'structure' => 'Subject + will have + verb(v3)',
            'example1' => 'He will have played football.',
            'example2' => 'I will have completed my assignment.',
            'tense' => 'future',
            'continuous' => 0,
            'perfect' => 1
        ]);
        DB::table('tenses')->insert([
            'id' => 13,
            'name' => 'Future Perfect Continuous Tense',
            'abbrev' => '',
            'structure' => 'Subject + will have been + verb(+ing)',
            'example1' => 'He will have been watching the football match for over fifty minutes.',
            'example2' => '',
            'tense' => 'future',
            'continuous' => 1,
            'perfect' => 1
        ]);
        DB::table('tenses')->insert([
            'id' => 14,
            'name' => 'Past Future Tense',
            'abbrev' => '',
            'structure' => 'Subject + would + verb (v1)',
            'example1' => 'I told that I would leave in one hour.',
            'example2' => '',
            'tense' => 'past future',
            'continuous' => 0,
            'perfect' => 0
        ]);
        DB::table('tenses')->insert([
            'id' => 15,
            'name' => 'Past Future Continuous Tense',
            'abbrev' => '',
            'structure' => 'Subject + should be/would be + Verb(+ing)',
            'example1' => 'I told that I would be doing my homework all day long.',
            'example2' => '',
            'tense' => 'past future',
            'continuous' => 1,
            'perfect' => 0
        ]);
        DB::table('tenses')->insert([
            'id' => 16,
            'name' => 'Past Future Perfect Tense',
            'abbrev' => '',
            'structure' => 'Subject + should have/ would have + Verb(v3)',
            'example1' => 'She said that she would have completed her assignment.',
            'example2' => '',
            'tense' => 'past future',
            'continuous' => 0,
            'perfect' => 1
        ]);
        DB::table('tenses')->insert([
            'id' => 17,
            'name' => 'Past Future Perfect Continuous Tense',
            'abbrev' => '',
            'structure' => 'Subject + would have been + Verb(+ing)',
            'example1' => 'He said that I should have been working here for two hours by that time.',
            'example2' => '',
            'tense' => 'past future',
            'continuous' => 1,
            'perfect' => 1
        ]);

        Schema::create('lang_ar', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_zh', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_hr', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_cs', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_da', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_nl', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_en', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_fi', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_fr', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_de', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_el', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_it', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_ja', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_ko', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_no', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_pl', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_pt', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_ro', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_ru', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_es', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_sv', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_th', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_tr', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_uk', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_vi', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_he', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });

        Schema::create('lang_la', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('term_id')->default(1);
            $table->string('word', 100)->nullable(false);
            $table->unsignedBigInteger('gender_id')->default(1);
            $table->unsignedBigInteger('plurality_id')->default(1);
            $table->unsignedBigInteger('tense_id')->default(1);
            $table->timestamps();
            $table->index('word');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('plurality_id')->references('id')->on('plurality')->onDelete('cascade');
            $table->foreign('tense_id')->references('id')->on('tenses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plurality');
        Schema::dropIfExists('tenses');
        Schema::dropIfExists('lang_ar');
        Schema::dropIfExists('lang_zh');
        Schema::dropIfExists('lang_hr');
        Schema::dropIfExists('lang_cs');
        Schema::dropIfExists('lang_da');
        Schema::dropIfExists('lang_nl');
        Schema::dropIfExists('lang_en');
        Schema::dropIfExists('lang_fi');
        Schema::dropIfExists('lang_fr');
        Schema::dropIfExists('lang_de');
        Schema::dropIfExists('lang_el');
        Schema::dropIfExists('lang_it');
        Schema::dropIfExists('lang_ja');
        Schema::dropIfExists('lang_ko');
        Schema::dropIfExists('lang_no');
        Schema::dropIfExists('lang_pl');
        Schema::dropIfExists('lang_pt');
        Schema::dropIfExists('lang_ro');
        Schema::dropIfExists('lang_ru');
        Schema::dropIfExists('lang_es');
        Schema::dropIfExists('lang_sv');
        Schema::dropIfExists('lang_th');
        Schema::dropIfExists('lang_tr');
        Schema::dropIfExists('lang_uk');
        Schema::dropIfExists('lang_vi');
        Schema::dropIfExists('lang_he');
        Schema::dropIfExists('lang_la');
    }
}

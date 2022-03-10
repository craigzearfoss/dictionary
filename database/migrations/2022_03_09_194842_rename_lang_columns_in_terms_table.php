<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameLangColumnsInTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('terms', function (Blueprint $table) {
            $table->renameColumn('en_uk', 'collins_en_uk');
            $table->renameColumn('en_us', 'collins_en_us');
            $table->renameColumn('ar', 'collins_ar');
            $table->renameColumn('cs', 'collins_cs');
            $table->renameColumn('da', 'collins_da');
            $table->renameColumn('de', 'collins_de');
            $table->renameColumn('el', 'collins_el');
            $table->renameColumn('es_es', 'collins_es_es');
            $table->renameColumn('es_la', 'collins_es_la');
            $table->renameColumn('fi', 'collins_fi');
            $table->renameColumn('fr', 'collins_fr');
            $table->renameColumn('hr', 'collins_hr');
            $table->renameColumn('it', 'collins_it');
            $table->renameColumn('ja', 'collins_ja');
            $table->renameColumn('ko', 'collins_ko');
            $table->renameColumn('nl', 'collins_nl');
            $table->renameColumn('no', 'collins_no');
            $table->renameColumn('pl', 'collins_pl');
            $table->renameColumn('pt_br', 'collins_pt_br');
            $table->renameColumn('pt_pt', 'collins_pt_pt');
            $table->renameColumn('ro', 'collins_ro');
            $table->renameColumn('ru', 'collins_ru');
            $table->renameColumn('sv', 'collins_sv');
            $table->renameColumn('th', 'collins_th');
            $table->renameColumn('tr', 'collins_tr');
            $table->renameColumn('uk', 'collins_uk');
            $table->renameColumn('vi', 'collins_vi');
            $table->renameColumn('zh', 'collins_zh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('terms', function (Blueprint $table) {
            //
        });
    }
}

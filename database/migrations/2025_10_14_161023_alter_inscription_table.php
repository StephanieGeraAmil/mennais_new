<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->foreignId('group_inscription_id')
                  ->nullable()
                  ->constrained('group_inscriptions')
                  ->nullOnDelete(); // elimina el vínculo si la grupal se borra
        });
       
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('inscriptions', function (Blueprint $table) {
             $table->dropForeign(['group_inscription_id']);
            $table->dropColumn('group_inscription_id');
        });
    }
};
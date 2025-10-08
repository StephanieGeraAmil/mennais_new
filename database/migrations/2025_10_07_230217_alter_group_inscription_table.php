<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGroupInscriptionTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('group_inscriptions', function (Blueprint $table) {
            $table->integer("quantity_remote_avaiable")->after('quantity_remote');
            $table->integer("quantity_hybrid_avaiable")->after('quantity_hybrid');
            $table->string("code_hybrid")->nullable();
            $table->string("code_remote")->nullable();
        });
    }
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('group_inscriptions', function (Blueprint $table) {
            $table->dropColumn(["quantity_remote_avaiable","quantity_hybrid_avaiable","code_hybrid","code_remote"]);
        });
    }
}

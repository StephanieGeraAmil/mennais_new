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
            $table->integer("quantity_remote")->after('quantity');
            $table->integer("quantity_hybrid")->after('quantity_remote');
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
            $table->dropColumn(["quantity_remote","quantity_hybrid"]);
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');            
            $table->string('email');
            $table->string('phone');
            $table->integer('quantity');
            $table->integer('institution_id');
            $table->integer('payment_id')->default(0);
            $table->string('code');
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
        Schema::dropIfExists('group_inscriptions');
    }
}

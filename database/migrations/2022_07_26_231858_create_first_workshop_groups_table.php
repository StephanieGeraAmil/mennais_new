<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstWorkshopGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first_workshop_groups', function (Blueprint $table) {
            $table->id();
            $table->time('start_at');
            $table->time('end_at');
            $table->integer('school_id');
            $table->integer('capacity');
            $table->boolean('has_vacant');
            $table->string('additional_text');
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
        Schema::dropIfExists('first_workshop_groups');
    }
}

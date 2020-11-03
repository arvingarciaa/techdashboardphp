<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicabilityIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicability_industries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('approved')->default(0);
            $table->integer('user_id')->nullable();
            $table->text('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicability_industries');
    }
}

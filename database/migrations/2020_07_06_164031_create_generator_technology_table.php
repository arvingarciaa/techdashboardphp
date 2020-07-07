<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneratorTechnologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generator_technology', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
  
            $table->bigInteger('technology_id')->unsigned();
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');

            $table->bigInteger('generator_id')->unsigned();
            $table->foreign('generator_id')->references('id')->on('generators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generator_technology', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
            $table->dropForeign(['generator_id']);
            $table->dropColumn('generator_id');
        });
        Schema::dropIfExists('generator_technology');
    }
}

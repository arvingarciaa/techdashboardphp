<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePotentialAdopterTechnologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potential_adopter_technology', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('technology_id')->unsigned();
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');

            $table->bigInteger('potential_adopter_id')->unsigned();
            $table->foreign('potential_adopter_id')->references('id')->on('potential_adopters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('potential_adopter_technology', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
            $table->dropForeign(['potential_adopter_id']);
            $table->dropColumn('potential_adopter_id');
        });
        Schema::dropIfExists('potential_adopter_technology');
    }
}

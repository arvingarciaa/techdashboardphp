<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnologyTechnologyCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technology_technology_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('technology_id')->unsigned();
            $table->foreign('technology_id')->references('id')->on('technologies');

            $table->bigInteger('technology_category_id')->unsigned();
            $table->foreign('technology_category_id')->references('id')->on('technology_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('technology_technology_category', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
            $table->dropForeign(['technology_category_id']);
            $table->dropColumn('technology_category_id');
        });
        Schema::dropIfExists('technology_technology_category');
    }
}

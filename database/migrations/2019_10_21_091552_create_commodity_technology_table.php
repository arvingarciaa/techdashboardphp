<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommodityTechnologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity_technology', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
  
            $table->bigInteger('technology_id')->unsigned();
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');

            $table->bigInteger('commodity_id')->unsigned();
            $table->foreign('commodity_id')->references('id')->on('commodities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commodity_technology', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
            $table->dropForeign(['commodity_id']);
            $table->dropColumn('commodity_id');
        });
        Schema::dropIfExists('commodity_technology');
    }
}

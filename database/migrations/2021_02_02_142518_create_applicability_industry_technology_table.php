<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicabilityIndustryTechnologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicability_industry_technology', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->bigInteger('technology_id')->unsigned();
            $table->foreign('technology_id')->references('id')->on('technologies');

            $table->bigInteger('applicability_industry_id')->unsigned();
            $table->foreign('applicability_industry_id',  'ai_id_foreign')->references('id')->on('applicability_industries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicability_industry_technology', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
            $table->dropForeign('ai_id_foreign');
            $table->dropColumn('applicability_industry_id');
        });
        Schema::dropIfExists('applicability_industry_technology');
    }
}

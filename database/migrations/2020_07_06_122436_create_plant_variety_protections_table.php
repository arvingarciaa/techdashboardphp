<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantVarietyProtectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_variety_protections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('application_number')->nullable();
            $table->text('applicant')->nullable();
            $table->text('crop')->nullable();
            $table->text('denomination')->nullable();
            $table->text('description_of_variety')->nullable();
            $table->bigInteger('certificate_number')->nullable();
            $table->date('date_of_issuance')->nullable();
            $table->text('duration_of_protection')->nullable();
            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plant_variety_protections', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
        });
        Schema::dropIfExists('plant_variety_protections');
    }
}

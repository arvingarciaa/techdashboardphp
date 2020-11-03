<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilityModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utility_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('application_number')->nullable();
            $table->bigInteger('um_number')->nullable();
            $table->date('date_of_filing')->nullable();
            $table->date('registration_date')->nullable();
            $table->text('status')->nullable();
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
        Schema::table('utility_models', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
        });
        Schema::dropIfExists('utility_models');
    }
}

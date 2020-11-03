<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustrialDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industrial_designs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('application_number')->nullable();
            $table->bigInteger('registration_number')->nullable();
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
        Schema::table('industrial_designs', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
        });
        Schema::dropIfExists('industrial_designs');
    }
}

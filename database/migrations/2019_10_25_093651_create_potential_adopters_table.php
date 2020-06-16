<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePotentialAdoptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potential_adopters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('name');
            $table->unsignedBigInteger('adopter_type_id');
            $table->foreign('adopter_type_id')->references('id')->on('adopter_types')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('potential_adopters', function($table){
            $table->dropForeign(['adopter_type_id']);
            $table->dropColumn('adopter_type_id');
        });
        Schema::dropIfExists('potential_adopters');
    }
}

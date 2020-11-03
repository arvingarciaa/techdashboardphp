<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommoditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('name');
            $table->unsignedBigInteger('sector_id');
            $table->integer('user_id')->nullable();
            $table->integer('approved')->default(0);
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commodities', function($table){
            $table->dropForeign(['sector_id']);
            $table->dropColumn('sector_id');
        });
        Schema::dropIfExists('commodities');
    }
}

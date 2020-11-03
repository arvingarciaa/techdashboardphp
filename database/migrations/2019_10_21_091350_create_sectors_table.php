<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('name');
            $table->integer('user_id')->nullable();
            $table->integer('approved')->default(0);
            $table->unsignedBigInteger('industry_id');
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sectors', function($table){
            $table->dropForeign(['industry_id']);
            $table->dropColumn('industry_id');
        });
        Schema::dropIfExists('sectors');
    }
}

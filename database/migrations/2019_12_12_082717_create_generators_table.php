<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('title')->nullable();
            $table->text('name');
            $table->text('availability')->nullable();
            $table->text('expertise')->nullable();
            $table->unsignedBigInteger('agency_id');
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generators', function($table){
            $table->dropForeign(['agency_id']);
            $table->dropColumn('agency_id');
        });
        Schema::dropIfExists('generators');
    }
}

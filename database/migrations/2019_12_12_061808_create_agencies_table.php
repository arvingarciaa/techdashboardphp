<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('name');
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('fax')->nullable();
            $table->unsignedBigInteger('agency_type_id');
            $table->foreign('agency_type_id')->references('id')->on('agency_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agencies', function($table){
            $table->dropForeign(['agency_type_id']);
            $table->dropColumn('agency_type_id');
        });
        Schema::dropIfExists('agencies');
    }
}

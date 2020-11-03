<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdoptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adopters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('name');
            $table->text('region')->nullable();
            $table->text('province')->nullable();
            $table->text('municipality')->nullable();
            $table->text('phone')->nullable();
            $table->text('fax')->nullable();
            $table->text('email')->nullable();
            $table->integer('approved')->default(0);
            $table->integer('user_id')->nullable();
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
        Schema::table('adopters', function($table){
            $table->dropForeign(['adopter_type_id']);
            $table->dropColumn('adopter_type_id');
        });
        Schema::dropIfExists('adopters');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdopterTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adopter_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->integer('approved')->default(0);
            $table->text('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adopter_types');
    }
}

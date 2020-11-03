<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('banner')->nullable();
            $table->text('button_link')->nullable();
            $table->Integer('position');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousel_items');
    }
}

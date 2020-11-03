<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('name')->nullable();
            $table->text('link')->nullable();
            $table->Integer('default')->nullable();
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
        Schema::dropIfExists('header_links');
    }
}

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
            $table->text('region')->nullable();
            $table->text('province')->nullable();
            $table->text('municipality')->nullable();
            $table->text('district')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->integer('approved')->default(0);
            $table->integer('user_id')->nullable();
            $table->text('fax')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencies');
    }
}

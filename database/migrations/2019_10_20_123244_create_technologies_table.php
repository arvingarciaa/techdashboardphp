<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('name')->nullable();
            $table->text('region')->nullable();
            $table->text('province')->nullable();
            $table->text('municipality')->nullable();
            $table->year('year_developed')->nullable();
            $table->text('description')->nullable();
            $table->mediumText('narrative')->nullable();
            $table->integer('is_trade_secret')->nullable();
            $table->string('protection_type')->nullable();
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technologies');
    }
}

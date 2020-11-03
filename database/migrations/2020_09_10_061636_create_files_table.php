<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('filename');
            $table->text('category');
            $table->integer('filesize')->nullable();
            $table->text('filetype');
            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
        });
        Schema::dropIfExists('files');
    }
}

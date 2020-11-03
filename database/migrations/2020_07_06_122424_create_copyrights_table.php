<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopyrightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copyrights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('owners')->nullable();
            $table->text('publishers')->nullable();
            $table->date('date_of_creation')->nullable();
            $table->date('registration_date')->nullable();
            $table->date('date_of_issuance')->nullable();
            $table->text('classes')->nullable();
            $table->bigInteger('registration_number')->nullable();
            $table->text('status')->nullable();
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
        Schema::table('copyrights', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
        });
        Schema::dropIfExists('copyrights');
    }
}

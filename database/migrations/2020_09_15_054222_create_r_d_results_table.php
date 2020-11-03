<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRDResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_d_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('utilization')->nullable();
            $table->text('title')->nullable();
            $table->text('funding')->nullable();
            $table->text('implementing')->nullable();
            $table->Decimal('cost', 12,2)->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('beneficiary_type')->nullable();
            $table->text('beneficiary_name')->nullable();
            $table->text('beneficiary_region')->nullable();
            $table->text('beneficiary_province')->nullable();
            $table->text('beneficiary_municipality')->nullable();
            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('r_d_results', function($table){
            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
        });
        Schema::dropIfExists('r_d_results');
    }
}

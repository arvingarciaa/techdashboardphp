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
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('significance')->nullable();
            $table->text('target_users')->nullable();
            $table->text('applicability_location')->nullable();
            $table->text('applicability_industry')->nullable();
            $table->text('commercialization_mode')->nullable();
            $table->year('year_developed')->nullable();
            $table->integer('is_trade_secret')->default(0);
            $table->integer('is_invention')->default(0);
            $table->integer('user_id')->nullable();
            $table->integer('approved')->default(0);
            $table->text('image')->nullable();
            $table->text('basic_research_title')->nullable();
            $table->text('basic_research_funding')->nullable();
            $table->text('basic_research_implementing')->nullable();
            $table->Decimal('basic_research_cost',12,2)->default(0);
            $table->date('basic_research_start_date')->nullable();
            $table->date('basic_research_end_date')->nullable();
            $table->text('applied_research_type')->nullable();
            $table->text('applied_research_title')->nullable();
            $table->text('applied_research_funding')->nullable();
            $table->text('applied_research_implementing')->nullable();
            $table->Decimal('applied_research_cost',12,2)->default(0);
            $table->date('applied_research_start_date')->nullable();
            $table->date('applied_research_end_date')->nullable();
            $table->text('application_of_technology')->nullable();
            $table->text('limitation_of_technology')->nullable();
            $table->text('banner')->nullable();
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

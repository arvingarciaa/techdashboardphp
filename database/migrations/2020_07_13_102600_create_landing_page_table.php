<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text('footer_about')->nullable();
            $table->Integer('landing_page_item_carousel')->default(1);
            $table->Integer('landing_page_item_social_media_button')->default(1);
            $table->Integer('landing_page_item_technology_counter')->default(1);
            $table->Integer('landing_page_item_technology_grid_view')->default(1);
            $table->Integer('landing_page_item_technology_table_view')->default(1);
            $table->Integer('landing_page_item_technology_dashboard_view')->default(1);
            $table->Integer('landing_page_item_technology_commodity_view')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landing_pages');
    }
}

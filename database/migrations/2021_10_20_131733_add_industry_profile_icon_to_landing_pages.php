<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndustryProfileIconToLandingPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_pages', function (Blueprint $table) {

            $table->text('industry_profile_agri_icon')->nullable();
            $table->text('industry_profile_aqua_icon')->nullable();
            $table->text('industry_profile_natural_icon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_pages', function (Blueprint $table) {
            //
            $table->dropColumn('industry_profile_agri_icon');
            $table->dropColumn('industry_profile_aqua_icon');
            $table->dropColumn('industry_profile_natural_icon');
        });
    }
}

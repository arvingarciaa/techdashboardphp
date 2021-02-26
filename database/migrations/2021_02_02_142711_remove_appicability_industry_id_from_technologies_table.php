<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAppicabilityIndustryIdFromTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('technologies', function (Blueprint $table) {
            $table->dropColumn('applicability_industry');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('technologies', function (Blueprint $table) {
            $table->unsignedBigInteger('applicability_industry')->nullable();
        });
    }
}

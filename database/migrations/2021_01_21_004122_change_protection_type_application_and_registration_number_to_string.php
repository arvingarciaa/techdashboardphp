<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProtectionTypeApplicationAndRegistrationNumberToString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patents', function (Blueprint $table) {
            //
            $table->text('application_number')->nullable()->change();
            $table->text('patent_number')->nullable()->change();
        });
        Schema::table('utility_models', function (Blueprint $table) {
            //
            $table->text('application_number')->nullable()->change();
            $table->text('um_number')->nullable()->change();
        });
        Schema::table('industrial_designs', function (Blueprint $table) {
            //
            $table->text('application_number')->nullable()->change();
            $table->text('registration_number')->nullable()->change();
        });
        Schema::table('trademarks', function (Blueprint $table) {
            //
            $table->text('application_number')->nullable()->change();
            $table->text('registration_number')->nullable()->change();
        });
        Schema::table('copyrights', function (Blueprint $table) {
            //
            $table->text('registration_number')->nullable()->change();
        });
        Schema::table('plant_variety_protections', function (Blueprint $table) {
            //
            $table->text('application_number')->nullable()->change();
            $table->text('certificate_number')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patents', function (Blueprint $table) {
            //
            $table->bigInteger('application_number')->charset(null)->nullable()->change();
            $table->bigInteger('patent_number')->charset(null)->nullable()->change();
        });
    }
}

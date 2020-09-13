<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('cases');
            $table->integer('todayCases');
            $table->integer('deaths');
            $table->integer('todayDeaths');
            $table->integer('recovered');
            $table->integer('active');
            $table->integer('critical');
            $table->integer('casesPerOneMillion');
            $table->integer('deathsPerOneMillion');
            $table->integer('totalTests');
            $table->integer('testsPerOneMillion');
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
        Schema::dropIfExists('countries_data');
    }
}

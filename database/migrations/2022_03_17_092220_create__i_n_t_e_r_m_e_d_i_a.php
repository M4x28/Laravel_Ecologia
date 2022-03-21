<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('INTERMEDIA', function (Blueprint $table) {
            $table->id();
            $table->id('fk_rifiuto');
            $table->id('fk_contenitore');
            $table->foreign('fk_rifiuto')->references('id')->on('RIFIUTI');
            $table->foreign('fk_contenitore')->references('id')->on('CONTENITORI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('INTERMEDIA');
    }
};

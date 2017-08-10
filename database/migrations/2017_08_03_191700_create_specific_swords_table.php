<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecificSwordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specific_swords', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('swords');
            $table->string('nickname')->nullable();
            $table->float('length')->nullable();
            $table->float('avg_width')->nullable();
            $table->float('weight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specific_swords');
    }
}

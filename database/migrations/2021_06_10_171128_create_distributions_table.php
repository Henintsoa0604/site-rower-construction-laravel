<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->increments('id');
            $table->float('dimension');
            $table->integer('chambre');
            $table->integer('toilette');
            $table->integer('salleDeBain');
            $table->string('cuisineSepare');
            $table->string('garage');
            $table->integer('modele_id')->unsigned()->index();
            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');
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
        Schema::dropIfExists('distributions');
    }
}

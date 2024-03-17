<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomRealisation');
            $table->mediumText('imageRealisation');
            $table->string('montantRealisation');
            $table->text('descriptionRealisation');
            $table->string('societeColaborateur')->nullable();
            $table->string('maitreOuvrage')->nullable();
            $table->string('architecte')->nullable();
            $table->string('province');
            $table->string('region');
            $table->string('district');
            $table->string('ville');
            $table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('type__constructions')->onDelete('cascade');
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
        Schema::dropIfExists('realisations');
    }
}

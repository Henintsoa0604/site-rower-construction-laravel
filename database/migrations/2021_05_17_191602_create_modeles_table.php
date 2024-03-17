<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modeles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomModele');
            $table->bigInteger('montantDeOperation');
            $table->text('descriptionModele');
            $table->mediumText('imageIllustration');
            $table->integer('construction_id')->unsigned()->index();
            $table->foreign('construction_id')->references('id')->on('type__constructions')->onDelete('cascade');
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
        Schema::dropIfExists('modeles');
    }
}

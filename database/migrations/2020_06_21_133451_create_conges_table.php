<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->bigIncrements('id_conge');//->unique();
            $table->unsignedBigInteger('id_typeconge');//->unsigned();//->unique();   //declarer le champs
            $table->foreign('id_typeconge')->references('id_typeconge')->on('typeconge');
            $table->unsignedBigInteger('matricule');//->unsigned();//->unique();   //declarer le champs
            $table->foreign('matricule')->references('matricule')->on('employes');
            $table->date('date_demande');
            $table->date('date_depart');
            $table->date('date_retour');
            $table->integer('nombredejours');


            // posix_cterm
            // idtype conges + matricule employe foreignkey
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conges');
    }
}

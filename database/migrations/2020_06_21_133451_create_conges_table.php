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
            $table->bigIncrements('id');//->unique();
            // $table->Integer('id_typeconge');
            $table->unsignedBigInteger('typeconge_id');//->unsigned();//->unique();   //declarer le champs
            $table->foreign('typeconge_id')->references('id')->on('typeconges')->onDelete('cascade');
            ;
            $table->unsignedBigInteger('employe_id');//->unsigned();//->unique();   //declarer le champs
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');
            $table->date('date_demande');
            $table->date('date_depart');
            $table->date('date_retour');
            $table->integer('nombredejours');

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

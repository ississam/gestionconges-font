<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');//->unique();
            $table->unsignedBigInteger('service_id');//->unsigned();//->unique();   //declarer le champs
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nom', 200)->nullable();
            $table->string('prenom', 200);
            $table->string('adresse', 300);
            $table->integer('tel');
            $table->string('email');
            $table->date('date_naissance');
            $table->date('daterecrutement');
            $table->string('photo');
            $table->string('poste');
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
        Schema::dropIfExists('employes');
    }
}

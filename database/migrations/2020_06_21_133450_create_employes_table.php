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
            $table->bigIncrements('matricule');//->unique();
            $table->unsignedBigInteger('id_service');//->unsigned();//->unique();   //declarer le champs
            $table->foreign('id_service')->references('id_service')->on('services');//->onDelete('cascade');
            $table->string('nom', 200);
            $table->string('prenom', 200);
            $table->string('adresse', 300);
            $table->integer('tel');
            $table->string('email');
            $table->date('date_naissance');
            $table->date('daterecrutement');


            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            // posix_cterm
            // idservice foreignkey

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
        Schema::dropIfExists('_employes');
    }
}

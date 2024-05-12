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
        Schema::create('resultat_examens', function (Blueprint $table) {
            $table->id();
            $table->text('objet');
            $table->text('interpretation');
            $table->date('date_examen');
            $table->unsignedBigInteger('id_consultation'); // clé étrangère vers la table des consultations
            $table->unsignedBigInteger('id_examen_complet'); // clé étrangère vers la table des examens complets

             // Contraintes de clé étrangère
            $table->foreign('id_consultation')->references('id')->on('consultations')->onDelete('cascade');
            $table->foreign('id_examen_complet')->references('id')->on('examen_complets')->onDelete('cascade');
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
        Schema::dropIfExists('resultat_examens');
    }
};

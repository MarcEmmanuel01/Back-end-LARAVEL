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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->date('date_cons');
            $table->text('constantes')->nullable();
            $table->text('diagnostiques')->nullable();
            $table->string('pathologie',255);
            $table->text('prescription')->nullable();
            $table->date('date_rdv')->nullable();
            $table->unsignedBigInteger('id_dossier_patient');
            $table->unsignedBigInteger('id_medecin');

            // Clé étrangère vers la table des dossiers patients
            $table->foreign('id_dossier_patient')->references('id')->on('dossier_patients')->onDelete('cascade');

            // Clé étrangère vers la table des médecins
            $table->foreign('id_medecin')->references('id')->on('medecins')->onDelete('cascade');

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
        Schema::dropIfExists('consultations');
    }
};

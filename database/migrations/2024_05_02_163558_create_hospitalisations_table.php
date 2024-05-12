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
        Schema::create('hospitalisations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lit'); // clé étrangère vers la table des lits
            $table->unsignedBigInteger('id_consultation'); // clé étrangère vers la table des consultations
            $table->date('date_debut');
            $table->date('date_fin');


            // Contraintes de clé étrangère
            $table->foreign('id_lit')->references('id')->on('lits')->onDelete('cascade');
            $table->foreign('id_consultation')->references('id')->on('consultations')->onDelete('cascade');
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
        Schema::dropIfExists('hospitalisations');
    }
};

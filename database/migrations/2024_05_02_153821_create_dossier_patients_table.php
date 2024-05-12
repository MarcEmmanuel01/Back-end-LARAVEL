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
        Schema::create('dossier_patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom_pat');
            $table->string('prenom_pat');
            $table->date('date_de_naiss_pat');
            $table->string('lieu_de_naiss_pat');
            $table->string('localisation');
            $table->string('tel_pat');
            $table->string('email_pat');
            $table->string('profession_pat');
            $table->text('antecedents')->nullable();

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
        Schema::dropIfExists('dossier_patients');
    }
};

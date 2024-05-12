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
        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
            $table->string('grade_med');
            $table->string('specialite_med');
            $table->string('nom_med');
            $table->string('prenom_med');
            $table->string('tel_med')->unique();
            $table->string('email_med')->unique();
            $table->string('cni_med')->unique();
            $table->string('compte_banquaire_med')->unique();

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
        Schema::dropIfExists('medecins');
    }
};

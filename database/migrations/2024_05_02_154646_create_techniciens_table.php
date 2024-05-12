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
        Schema::create('techniciens', function (Blueprint $table) {
            $table->id();
            $table->string('nom_tech');
            $table->string('prenom_tech');
            $table->string('tel_tech')->unique();
            $table->string('email_tech')->unique();
            $table->string('cni_tech')->unique();
            $table->string('compte_banquaire_tech')->unique();
            $table->string('grade_tech');
            $table->string('specialite_tech');

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
        Schema::dropIfExists('techniciens');
    }
};

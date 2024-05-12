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
        Schema::create('accouchements', function (Blueprint $table) {
            $table->id();
            $table->date('date_accou');
            $table->text('description_accou')->nullable();
            $table->unsignedBigInteger('id_technicien');
            $table->unsignedBigInteger('id_consultation');

            // Clé étrangère vers la table des techniciens
            $table->foreign('id_technicien')->references('id')->on('techniciens')->onDelete('cascade');

            // Clé étrangère vers la table des consultations
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
        Schema::dropIfExists('accouchements');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('logements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('type');
            $table->decimal('prix', 10, 2);
            $table->string('localisation');
            $table->string('proprietaire');
            $table->string('locataire')->nullable();
            $table->enum('genre_locataire', ['homme', 'femme', 'mixte'])->default('mixte');
            $table->integer('nbr_avance')->default(0);
            $table->decimal('caution', 10, 2)->default(0);
            $table->boolean('eau')->default(false);
            $table->string('type_compteur_eau')->nullable();
            $table->boolean('electricite')->default(false);
            $table->string('type_compteur_electricite')->nullable();
            $table->decimal('surface', 8, 2)->nullable();
            $table->integer('nombre_pieces')->nullable();
            $table->boolean('meuble')->default(false);
            $table->date('disponibilite')->nullable();
            $table->text('description')->nullable();
            $table->string('type_chauffage')->nullable();
            $table->decimal('charges', 10, 2)->default(0);
            $table->string('contact_tel')->nullable();
            $table->boolean('wifi_inclus')->default(false);
            $table->json('photos')->nullable();
            $table->string('statut')->default('disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logements');
    }
};

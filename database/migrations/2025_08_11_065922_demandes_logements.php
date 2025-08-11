<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demandes_logements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('lieu');
            $table->string('type_chambre');
            $table->boolean('electricite')->default(false);
            $table->text('description_electricite')->nullable();
            $table->boolean('eau')->default(false);
            $table->text('description_eau')->nullable();
            $table->integer('nombre_chambres')->default(1);
            $table->text('autres_criteres')->nullable();
            $table->boolean('assurance_velo')->default(false);

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes_logements');
    }
};

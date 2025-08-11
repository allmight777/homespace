<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAssuranceVeloColumnInDemandesLogementsTable extends Migration
{
    public function up()
    {
        Schema::table('demandes_logements', function (Blueprint $table) {

            $table->dropColumn('assurance_velo');

            $table->text('reponse_admin')->nullable();
        });
    }

    public function down()
    {
        Schema::table('demandes_logements', function (Blueprint $table) {

            $table->dropColumn('reponse_admin');
            $table->boolean('assurance_velo')->default(false);
        });
    }
}

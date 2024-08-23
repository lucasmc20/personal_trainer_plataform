<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYoutubeLinkToPlanoTreinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plano_treinos', function (Blueprint $table) {
            $table->string('youtube_link')->nullable(); // Adiciona a coluna youtube_link
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plano_treinos', function (Blueprint $table) {
            $table->dropColumn('youtube_link'); // Remove a coluna youtube_link
        });
    }
}

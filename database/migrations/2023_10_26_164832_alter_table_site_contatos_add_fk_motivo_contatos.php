<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Adicionando a coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        // Atribuindo motivo_contato para motivo_contato_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo');

        //Criando a FK e remover a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Criando coluna motivo_contato e removenvo a fk
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        DB::statement('update site_contatos set motivo = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });


    }
};

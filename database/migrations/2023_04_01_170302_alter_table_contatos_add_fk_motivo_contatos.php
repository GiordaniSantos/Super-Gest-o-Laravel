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
        Schema::table('contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //atribuindo motivo_contato para a nova coluna motivo_contatos_id
        DB::statement('update contatos set motivo_contatos_id = motivo_contato');

        //
        Schema::table('contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //criar coluna motivo_contato
        Schema::table('contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('contatos_motivo_contatos_id_foreign');
        });

        DB::statement('update contatos set motivo_contato = motivo_contatos_id');

        Schema::table('contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
};

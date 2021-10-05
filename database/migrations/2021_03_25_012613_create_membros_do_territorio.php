<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembrosDoTerritorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros_do_territorio', function (Blueprint $table) {
            $table->id();
            $table->string('Nome', 100);
            $table->string('Sobrenome', 100);
            $table->timestamp('DataNascimento')->useCurrent = true;
            $table->string('Sexo', 2);
            $table->string('Email', 100)->nullable();
            $table->string('Telefone', 13);
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
        Schema::dropIfExists('membros_do_territorio');
    }
}

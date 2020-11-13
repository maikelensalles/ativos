<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadastrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();
            $table->string('image');
			$table->string('nascimento'); 
			$table->string('genero');
			$table->string('cpf');
			$table->string('rg');
			$table->string('orgao');
			$table->string('estado_civil'); 
            $table->string('telefone');
            $table->string('cep');
            $table->string('endereco'); 
            $table->string('numero'); 
            $table->string('complemento'); 
            $table->string('bairro'); 
            $table->string('cidade'); 
            $table->string('estado'); 
            $table->string('empresa'); 
            $table->string('profissao'); 
            $table->string('cargo'); 
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
        Schema::dropIfExists('cadastros');
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('empresa_id')->unsigned();
            $table->string('nome');
            $table->string('slug');
            $table->string('email');
            $table->string('telefone');
            $table->string('cpf');
            $table->timestamps();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}

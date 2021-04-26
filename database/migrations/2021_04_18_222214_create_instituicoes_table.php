<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('cnpj')->unique();
            $table->unsignedBigInteger('responsavel');
            $table->text('descricao');
            $table->double('total_arrecadado')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();

            //foreign key
            $table->foreign('responsavel')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituicoes');
    }
}

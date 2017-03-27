<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadeHtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade_hts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('instituicao_id')->unsigned();
            $table->foreign('instituicao_id')->
                    references('id')->
                    on('instituicao_hts')->
                    onDelete('no action')->
                    onUpdate('no action');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->
                    references('id')->
                    on('cidade_hts')->
                    onDelete('no action')->
                    onUpdate('no action');
            $table->string('unidade_nome',60);
            $table->string('unidade_endereco',100);
            $table->string('unidade_telefone',15);
            $table->string('unidade_email',60)->unique();
            $table->string('unidade_senha',60);
            $table->tinyInteger('unidade_tipo')->default('2');            
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
        Schema::dropIfExists('unidade_hts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaHtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma_hts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')->
                    references('id')->
                    on('unidade_hts')->
                    onDelete('no action')->
                    onUpdate('no action');
            $table->integer('turma_codigo')->unsigned();
            $table->string('turma_nome',50)->unique;            
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
        Schema::dropIfExists('turma_hts');
    }
}

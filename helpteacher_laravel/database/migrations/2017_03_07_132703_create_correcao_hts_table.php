<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrecaoHtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correcao_hts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('questao_id')->unsigned();
            $table->foreign('questao_id')->
                    references('id')->
                    on('questao_hts')->
                    onDelete('cascade')->
                    onUpdate('cascade');
            $table->integer('correcao_numero')->unsigned();
            $table->char('correcao_resposta',1);
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
        Schema::dropIfExists('correcao_hts');
    }
}

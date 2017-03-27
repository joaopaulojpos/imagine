<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestaoHtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questao_hts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('gabarito_id')->unsigned();
            $table->foreign('gabarito_id')->
                    references('id')->
                    on('gabarito_hts')->
                    onDelete('no action')->
                    onUpdate('cascade');
            $table->integer('questao_numero')->unsigned();
            $table->char('questao_resposta',1);
            $table->decimal('questao_nota',5,2);
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
        Schema::dropIfExists('questao_hts');
    }
}

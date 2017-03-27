<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGabaritoHtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gabarito_hts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('prova_id')->unsigned();
            $table->foreign('prova_id')->
                    references('id')->
                    on('prova_hts')->
                    onDelete('no action')->
                    onUpdate('cascade');
            $table->integer('gabarito_codigo')->unsigned();
            $table->date('gabarito_data');
            $table->enum('gabarito_status',['ativo','inativo'])->default('ativo');
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
        Schema::dropIfExists('gabarito_hts');
    }
}

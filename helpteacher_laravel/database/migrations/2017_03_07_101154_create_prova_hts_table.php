<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvaHtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova_hts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('assunto_id')->unsigned();
            $table->foreign('assunto_id')->
                    references('id')->
                    on('assunto_hts')->
                    onDelete('no action')->
                    onUpdate('cascade');         
            $table->date('prova_data');
            $table->enum('prova_status',['ativo','inativo'])->default('ativo');
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
        Schema::dropIfExists('prova_hts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorHtUnidadeHtHtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_ht_unidade_ht_hts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('professor_id')->unsigned()->nullable();
            $table->foreign('professor_id')->
                    references('id')->
                    on('professor_hts')->
                    onDelete('no action')->
                    onUpdate('cascade');
            $table->integer('unidade_id')->unsigned()->nullable();
            $table->foreign('unidade_id')->
                    references('id')->
                    on('unidade_hts')->
                    onDelete('no action')->
                    onUpdate('cascade');
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
        Schema::dropIfExists('professor_ht_unidade_ht_hts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::unprepared('CREATE TRIGGER insertIdUnidadeOnProfUnid AFTER INSERT ON `unidade_hts` FOR EACH ROW

            BEGIN

                INSERT INTO `professor_ht_unidade_ht_hts`(`unidade_id`) VALUES(new.id);
                
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

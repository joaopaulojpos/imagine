<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER insertIdProfessorOnProfUnid AFTER INSERT ON `professor_hts` FOR EACH ROW

            BEGIN

                UPDATE `professor_ht_unidade_ht_hts` SET `professor_id` = new.id;
                
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER id_stores BEFORE INSERT ON students FOR EACH ROW 
                BEGIN
                    INSERT INTO sequence_tbls VALUES (NULL);
                    SET NEW.unique_id = CONCAT("UB", LPAD(LAST_INSERT_ID(), 3, "0"));
                END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER ""id_stores');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTaller extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS taller (
                id                   INTEGER(255) not null auto_increment,
                nombre               VARCHAR(100) not null,
                area                 VARCHAR(100) not null,
                created_at		 	 datetime,
                updated_at			 datetime,
                CONSTRAINT pk_taller PRIMARY KEY(id)
            )ENGINE=InnoDB;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('taller');
    }
}

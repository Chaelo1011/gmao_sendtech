<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHerramientas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS herramientas (
                id                   INTEGER(255) not null auto_increment,
                nombre               VARCHAR(100) not null,
                dimensiones          FLOAT(10,2),
                dimensiones_medida   VARCHAR(5),
                capacidad            FLOAT(10),
                capacidad_medida     VARCHAR(5),
                created_at		 	 datetime,
                updated_at			 datetime,
                CONSTRAINT pk_herramientas PRIMARY KEY(id)
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
        Schema::drop('herramientas');
    }
}

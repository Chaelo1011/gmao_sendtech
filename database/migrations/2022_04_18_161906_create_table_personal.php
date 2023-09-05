<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePersonal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS personal (
                id                   INTEGER(255) not null auto_increment,
                ci                   INTEGER(10) not null unique,
                nombre               VARCHAR(50) not null,
                apellido             VARCHAR(50) not null,
                nro_telefono         BIGINT,
                correo_electronico   VARCHAR(50),
                area                 VARCHAR(50),
                created_at		 	 datetime,
                updated_at			 datetime,
                CONSTRAINT pk_personal PRIMARY KEY(id)
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
        Schema::drop('personal');
    }
}

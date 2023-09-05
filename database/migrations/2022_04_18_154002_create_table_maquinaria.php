<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMaquinaria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS maquinaria (
                id                      INTEGER(255) not null auto_increment,
                serial_institucion      VARCHAR(150) not null unique,
                serial_maquina          VARCHAR(150) not null,
                nombre                  VARCHAR(100) not null,
                marca                   VARCHAR(50),
                modelo                  VARCHAR(50),
                capacidad               FLOAT(10,3),
                capacidad_medida        VARCHAR(5),
                condicion               VARCHAR(20) not null,
                observacion             TEXT,
                created_at		 	    datetime,
                updated_at			    datetime,
                id_taller               INTEGER(255),
                CONSTRAINT pk_maquinaria PRIMARY KEY(id),
                CONSTRAINT fk_maquinaria_taller FOREIGN KEY(id_taller) REFERENCES taller(id) ON DELETE CASCADE ON UPDATE CASCADE
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
        Schema::drop('maquinaria');
    }
}

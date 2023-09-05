<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlanMantenimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS plan_mantenimiento (
                id                   INTEGER(255) not null auto_increment,
                fecha                DATE,
                tipo_mantenimiento   VARCHAR(100),
                criticidad           VARCHAR(20),
                descripcion          TEXT,
                estatus              VARCHAR(30),
                created_at		 	 datetime,
                updated_at			 datetime,
                id_maquina           INTEGER(255),
                id_usuario           BIGINT unsigned,
                CONSTRAINT pk_plan_mantenimiento PRIMARY KEY(id),
                CONSTRAINT fk_mantenimiento_maquinaria FOREIGN KEY(id_maquina) REFERENCES maquinaria(id) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT fk_mantenimiento_usuario FOREIGN KEY(id_usuario) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
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
        Schema::drop('plan_mantenimiento');
    }
}

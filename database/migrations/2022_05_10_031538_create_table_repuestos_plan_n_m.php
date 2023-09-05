<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTableRepuestosPlanNM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS repuestos_plan_nm (
                id                   INTEGER(255) not null auto_increment,
                created_at		 	 datetime,
                updated_at			 datetime,
                id_repuesto          INTEGER(255),
                id_plan   INTEGER(255),
                CONSTRAINT pk_repuestos_plan_nm PRIMARY KEY(id),
                CONSTRAINT fk_repuestos_repuestos_nm FOREIGN KEY(id_repuesto) REFERENCES repuestos(id) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT fk_repuestos_plan_mantenimiento FOREIGN KEY(id_plan) REFERENCES plan_mantenimiento(id) ON DELETE CASCADE ON UPDATE CASCADE
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
        Schema::drop('repuestos_plan_nm');
    }
}

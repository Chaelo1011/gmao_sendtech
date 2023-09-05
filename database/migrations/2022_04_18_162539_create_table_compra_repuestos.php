<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompraRepuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS compra_repuestos (
                id                   INTEGER(255) not null auto_increment,
                fecha_compra         DATE,
                costo_total          FLOAT(12),
                medio_pago           VARCHAR(20),
                estatus              VARCHAR(15),
                created_at		 	 datetime,
                updated_at			 datetime,
                id_plan              INTEGER,
                CONSTRAINT pk_compra_repuestos PRIMARY KEY(id),
                CONSTRAINT fk_compra_repuestos_plan FOREIGN KEY(id_plan) REFERENCES plan_mantenimiento(id) ON DELETE CASCADE ON UPDATE CASCADE
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
        Schema::drop('compra_repuestos');
    }
}

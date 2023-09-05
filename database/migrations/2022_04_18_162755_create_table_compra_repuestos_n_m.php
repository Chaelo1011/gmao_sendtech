<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompraRepuestosNM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS compra_repuestos_nm (
                id                   INTEGER(255) not null auto_increment,
                created_at		 	 datetime,
                updated_at			 datetime,
                id_repuesto          INTEGER(255),
                id_compra_repuesto   INTEGER(255),
                CONSTRAINT pk_compra_repuestos_nm PRIMARY KEY(id),
                CONSTRAINT fk_compra_repuestos_repuestos FOREIGN KEY(id_repuesto) REFERENCES repuestos(id) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT fk_repuestos_compra_repuestos FOREIGN KEY(id_compra_repuesto) REFERENCES compra_repuestos(id) ON DELETE CASCADE ON UPDATE CASCADE
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
        Schema::drop('compra_repuestos_nm');
    }
}

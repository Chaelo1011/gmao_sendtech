<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHerramientasPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS herramienta_plan (
                id                   INTEGER(255) not null auto_increment,
                created_at		 	 datetime,
                updated_at			 datetime,
                id_herramienta       INTEGER(255),
                id_plan              INTEGER(255),
                CONSTRAINT pk_herramientas_plan PRIMARY KEY(id),
                CONSTRAINT fk_herramientas_plan FOREIGN KEY(id_herramienta) REFERENCES herramientas(id) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT fk_plan_herramientas FOREIGN KEY(id_plan) REFERENCES plan_mantenimiento(id) ON DELETE CASCADE ON UPDATE CASCADE
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
        Schema::drop('herramientas_plan');
    }
}

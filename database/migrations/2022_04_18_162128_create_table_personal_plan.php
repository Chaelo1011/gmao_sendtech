<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePersonalPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS personal_plan (
                id                   INTEGER(255) not null auto_increment,
                created_at		 	 datetime,
                updated_at			 datetime,
                id_personal          INTEGER(255),
                id_plan              INTEGER(255),
                CONSTRAINT pk_personal_plan PRIMARY KEY(id),
                CONSTRAINT fk_personal_plan FOREIGN KEY(id_personal) REFERENCES personal(id) ON DELETE CASCADE ON UPDATE CASCADE,
                CONSTRAINT fk_plan_personal FOREIGN KEY(id_plan) REFERENCES plan_mantenimiento(id) ON DELETE CASCADE ON UPDATE CASCADE
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
        Schema::drop('personal_plan');
    }
}

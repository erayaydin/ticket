<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepartmentIdToDepartmentUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('department_user', function (Blueprint $table) {
            $table->integer("department_id")->unsigned();

            $table->foreign("department_id")
                  ->references("id")->on("departments")
                  ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department_user', function (Blueprint $table) {
            $table->dropForeign("department_user_department_id_foreign");

            $table->dropColumn("department_id");
        });
    }
}

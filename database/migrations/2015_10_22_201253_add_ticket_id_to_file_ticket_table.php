<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTicketIdToFileTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_ticket', function (Blueprint $table) {
            $table->integer("ticket_id")->unsigned();

            $table->foreign("ticket_id")
                ->references("id")->on("tickets")
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
        Schema::table('file_ticket', function (Blueprint $table) {
            $table->dropForeign("file_ticket_ticket_id_foreign");

            $table->dropColumn("ticket_id");
        });
    }
}

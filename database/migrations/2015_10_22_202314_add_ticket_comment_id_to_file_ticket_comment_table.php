<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTicketCommentIdToFileTicketCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_ticket_comment', function (Blueprint $table) {
            $table->integer("ticket_comment_id")->unsigned();

            $table->foreign("ticket_comment_id")
                  ->references("id")->on("ticket_comments")
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
        Schema::table('file_ticket_comment', function (Blueprint $table) {
            $table->dropForeign("file_ticket_comment_ticket_comment_id_foreign");

            $table->dropColumn("ticket_comment_id");
        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFileIdToFileTicketCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_ticket_comment', function (Blueprint $table) {
            $table->integer("file_id")->unsigned();

            $table->foreign("file_id")
                  ->references("id")->on("files")
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
            $table->dropForeign("file_ticket_comment_file_id_foreign");

            $table->dropColumn("file_id");
        });
    }
}

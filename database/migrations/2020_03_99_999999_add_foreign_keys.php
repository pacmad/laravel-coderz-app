<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('notes', function (Blueprint $table) {
        $table -> bigInteger('ticket_id') -> unsigned() -> index();
        $table -> foreign('ticket_id') -> references('id') -> on('tickets');
      });

      Schema::table('ticket_user', function (Blueprint $table) {
        $table -> bigInteger('user_id') -> unsigned() -> index();
        $table -> foreign('user_id') -> references('id') -> on('users');

        $table -> bigInteger('ticket_id') -> unsigned() -> index();
        $table -> foreign('ticket_id') -> references('id') -> on('tickets');
      });

      Schema::table('tickets', function (Blueprint $table) {
        $table -> bigInteger('topic_id') -> unsigned() -> index();
        $table -> foreign('topic_id') -> references('id') -> on('topics');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('notes', function (Blueprint $table) {
            $table -> dropForeign(['ticket_id']);
            $table -> dropColumn('ticket_id');
      });

      Schema::table('ticket_user', function (Blueprint $table) {
            $table -> dropForeign(['user_id', 'ticket_id']);
            $table -> dropColumn(['user_id', 'ticket_id']);
      });

      Schema::table('tickets', function (Blueprint $table) {
            $table -> dropForeign(['topic_id']);
            $table -> dropColumn('topic_id');
      });
    }
}

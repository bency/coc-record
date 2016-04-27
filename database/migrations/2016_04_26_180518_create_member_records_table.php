<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->char('name', 20);
            $table->string('role');
            $table->integer('expLevel');
            $table->text('league');
            $table->integer('trophies');
            $table->integer('clanRank');
            $table->integer('previousClanRank');
            $table->integer('donations');
            $table->integer('donationsReceived');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member_records');
    }
}

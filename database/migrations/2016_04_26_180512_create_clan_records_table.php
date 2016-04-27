<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClanRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clan_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clan_id');
            $table->char('name', 20);
            $table->char('type', 20);
            $table->text('description');
            $table->text('badgeUrls');
            $table->text('location');
            $table->char('warFrequency', 20);
            $table->smallInteger('clanLevel');
            $table->integer('warWins');
            $table->integer('warWinStreak');
            $table->integer('clanPoints');
            $table->integer('requiredTrophies');
            $table->integer('members');
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
        Schema::drop('clan_records');
    }
}

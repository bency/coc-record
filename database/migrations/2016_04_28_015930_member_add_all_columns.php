<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MemberAddAllColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('role');
            $table->integer('expLevel');
            $table->text('league');
            $table->integer('trophies');
            $table->integer('clanRank');
            $table->integer('previousClanRank');
            $table->integer('donations');
            $table->integer('donationsReceived');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('expLevel');
            $table->dropColumn('league');
            $table->dropColumn('trophies');
            $table->dropColumn('clanRank');
            $table->dropColumn('previousClanRank');
            $table->dropColumn('donations');
            $table->dropColumn('donationsReceived');
        });
    }
}

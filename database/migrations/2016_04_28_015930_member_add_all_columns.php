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
            $table->string('role')->after('name');
            $table->integer('expLevel')->after('name');
            $table->integer('trophies')->after('name');
            $table->integer('clanRank')->after('name');
            $table->integer('previousClanRank')->after('name');
            $table->integer('donations')->after('name');
            $table->integer('donationsReceived')->after('name');
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
            $table->dropColumn('trophies');
            $table->dropColumn('clanRank');
            $table->dropColumn('previousClanRank');
            $table->dropColumn('donations');
            $table->dropColumn('donationsReceived');
        });
    }
}

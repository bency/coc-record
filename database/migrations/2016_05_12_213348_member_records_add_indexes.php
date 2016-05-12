<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MemberRecordsAddIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member_records', function (Blueprint $table) {
            $table->index(['member_id', 'trophies']);
            $table->index(['member_id', 'donations']);
            $table->index(['member_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member_records', function (Blueprint $table) {
            $table->dropIndex('member_records_member_id_trophies_index');
            $table->dropIndex('member_records_member_id_donations_index');
            $table->dropIndex('member_records_member_id_created_at_index');
        });
    }
}

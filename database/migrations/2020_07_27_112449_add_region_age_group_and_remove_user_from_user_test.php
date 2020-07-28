<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegionAgeGroupAndRemoveUserFromUserTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_test', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->integer('region_id')->after('test_id');
            $table->integer('age_group_id')->after('test_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_test', function (Blueprint $table) {
            //
        });
    }
}

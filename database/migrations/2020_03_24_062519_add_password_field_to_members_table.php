<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordFieldToMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('center_qualify')->nullable()->after('center_phone');
            $table->string('first_password_login')->nullable()->after('center_phone');
            $table->string('second_password_eWallet')->nullable()->after('center_phone');
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
            $table->dropColumn('center_qualify');
            $table->dropColumn('first_password_login');
            $table->dropColumn('second_password_eWallet');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePasswordColumnToCenterQualifyInCompanyInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies_info', function (Blueprint $table) {
            $table->renameColumn('password', 'center_qualify');
            $table->renameColumn('company_owner', 'member_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies_info', function (Blueprint $table) {
            $table->renameColumn('center_qualify', 'password');
            $table->renameColumn('member_id', 'company_owner');

        });
    }
}

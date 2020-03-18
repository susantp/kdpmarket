<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userID');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('rrn')->nullable();
            $table->string('deposit_name')->nullable();
            $table->date('deposit_date')->nullable();
            $table->string('voucher_no')->nullable();
            $table->string('account_owner')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('recruiter_id')->nullable();
            $table->string('recruiter_name')->nullable();
            $table->string('sponsor_id')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('center_name')->nullable();
            $table->string('center_phone')->nullable();
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
        Schema::dropIfExists('members');
    }
}
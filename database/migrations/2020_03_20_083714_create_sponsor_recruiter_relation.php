<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorRecruiterRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_recruiter', function (Blueprint $table) {
            $table->id();
            $table->string('userID');
            $table->integer('member_id');
            $table->string('sponsor_id')->nullable();
            $table->string('recruiter_id')->nullable();
            $table->string('recruiter_left')->nullable();
            $table->string('recruiter_right')->nullable();
            $table->set('status', ['yes', 'no'])->nullable();
            $table->dateTimeTz('bonus_at', 0)->nullable();
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
        Schema::dropIfExists('sponsor_recruiter');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv2')->create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('last_name', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('phone', 20);
            $table->string('user_type', 20);
            $table->string('email');
            $table->string('is_active', 1);
            $table->string('password', 30);
            $table->string('last_edit_user_id', 20);
            $table->integer('organization_id')->unsigned();
            $table->timestamps();

            $table->index(['organization_id']);
            $table->foreign('organization_id')->references('organization_id')->on('sp_organization');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sqlsrv2')->dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_organization', function (Blueprint $table) {
            $table->increments('organization_id');
            $table->string('organization_name', 100);
            $table->string('created_by', 20);
            $table->string('type_of_user', 20);
            $table->string('last_edit_user_id', 20);
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
        Schema::dropIfExists('sp_organization');
    }
}

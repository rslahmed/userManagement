<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('activity_log')->nullable();
            $table->integer('user_add')->nullable();
            $table->integer('user_edit')->nullable();
            $table->integer('user_delete')->nullable();
            $table->integer('role_add')->nullable();
            $table->integer('role_edit')->nullable();
            $table->integer('role_delete')->nullable();
            $table->integer('setting_access')->nullable();
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
        Schema::dropIfExists('roles');
    }
}

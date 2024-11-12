<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('department_id');
            $table->string('email')->unique();
            $table->string('phone');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('role_id')->references('id')
                                    ->on('roles')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');
            $table->foreign('department_id')->references('id')
                                    ->on('departments')
                                    ->onDelete('cascade')
                                    ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};

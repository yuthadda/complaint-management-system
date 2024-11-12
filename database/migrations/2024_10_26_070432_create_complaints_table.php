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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('anonymous');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('department_id');
            $table->string('title');
            $table->text('description');
            $table->string('files');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')
                                    ->on('categories')
                                    ->onDelete('cascade');
            $table->foreign('role_id')->references('id')
                                    ->on('roles')
                                    ->onDelete('cascade');
            $table->foreign('department_id')->references('id')
                                    ->on('departments')
                                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 8)->unique();
            $table->string('name');
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->enum('religion', ['islam', 'protestan', 'katolik', 'hindu', 'buddha', 'khonghucu']);
            $table->enum('gender', ['L', 'P']);
            $table->text('photo')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}

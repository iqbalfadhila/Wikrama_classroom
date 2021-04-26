<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 8)->Unique();
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rombel_id');
            $table->unsignedBigInteger('majors_id');
            $table->unsignedBigInteger('rayon_id');
            $table->enum('grade', [10, 11,12]);
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
        Schema::dropIfExists('students');
    }
}

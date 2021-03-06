<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->integer('matiere_id')->nullable();
            $table->integer('niveau_id')->nullable();
            $table->string('titre');
            $table->integer('view_count')->default(0);
            $table->integer('enrolled_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->string('session_url');
            $table->integer('status')->default(0);
            $table->longText('incourse')->nullable();
            $table->longText('description')->nullable();
            $table->string('photo')->nullable();
            $table->dateTime('debut_seance')->nullable();
            $table->dateTime('fin_seance')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
}

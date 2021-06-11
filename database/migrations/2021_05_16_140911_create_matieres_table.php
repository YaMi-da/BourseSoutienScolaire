<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('view_count')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
        });

        DB::table('matieres')->insert(
            array(
                'name' => 'Mathématiques',
            )
        );
        DB::table('matieres')->insert(
            array(
                'name' => 'Physique/Chimie',
            )
        );
        DB::table('matieres')->insert(
            array(
                'name' => 'Français',
            )
        );
        DB::table('matieres')->insert(
            array(
                'name' => 'Anglais',
            )
        );
        DB::table('matieres')->insert(
            array(
                'name' => 'Arabe',
            )
        );
        DB::table('matieres')->insert(
            array(
                'name' => 'Histoire/Géographie',
            )
        );
        DB::table('matieres')->insert(
            array(
                'name' => 'Science Vie et Terre',
            )
        );
        DB::table('matieres')->insert(
            array(
                'name' => 'Philosophie',
            )
        );
        DB::table('matieres')->insert(
            array(
                'name' => 'Education Islamique',
            )
        );
        DB::table('matieres')->insert(
            array(
                'name' => 'Informatique',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matieres');
    }
}

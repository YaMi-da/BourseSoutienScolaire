<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNiveauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveaux', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('view_count')->default(0);
            $table->timestamps();
        });

        DB::table('niveaux')->insert(
            array(
                'name' => 'CP',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => 'CE1',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => 'CE2',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => 'CE3',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => 'CE4',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => 'CE5',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => '1ère Année Collège',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => '2ème Année Collège',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => '3ème Année Collège',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => 'Tronc Commun',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => '1ère Année baccalauréat',
            )
        );
        DB::table('niveaux')->insert(
            array(
                'name' => '2ème Année baccalauréat',
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
        Schema::dropIfExists('niveaux');
    }
}

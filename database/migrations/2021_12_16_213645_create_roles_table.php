<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('name', 45)->unique();
            $table->string('desc', 1000)->nullable();
            $table->timestamps();
        });

        DB::table('roles')->insert(
            ['name' => 'Admin', 'desc' => 'Роль администратора'],
            ['name' => 'Student', 'desc' => 'Роль студента'],
            ['name' => 'Employer', 'desc' => 'Роль представителя организации'],
            ['name' => 'User', 'desc' => 'Временная роль']
        );
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

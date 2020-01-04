<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table ->unsignedBigInteger('user_id')->unsigned();
            $table ->unsignedBigInteger('role_id')->unsigned();
            $table->timestamps();
        });


        CreateRoleUserTable::startArtisanCommands();




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
    private static function startArtisanCommands(){

        if (File::exists(public_path('storage/')))
            File::deleteDirectory(public_path('storage/'));

            Artisan::call('storage:link');

        Artisan::call( 'db:seed', [
                '--class' => 'RolesTableSeeder',
                '--force' => true ]
        );
        Artisan::call( 'db:seed', [
                '--class' => 'UsersTableSeeder',
                '--force' => true ]
        );




    }
}

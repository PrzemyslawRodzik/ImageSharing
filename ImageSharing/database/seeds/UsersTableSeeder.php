<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected function createUserAdmin()
    {
       return User::create([
           'name' => 'Admin',
           'email' => 'admin@admin.com',
           'username' => 'admin',
           'password' => Hash::make('zxczxc'),
       ]);
    }



    public function run()
    {






        /* Tworzenie przykladowego admina */


        $adminRole = Role::where('name','admin')->first();

         $user =  $this->createUserAdmin();

        $user->roles()->attach($adminRole);
        /* Tworzenie przykladowego admina */



/* Tworzy 3 uzytkownikow i dodaje dla kazdego po 5 postow  
        $users = factory(App\User::class, 3)
            ->create()
            ->each(function ($user) {
                $user->posts()->createMany(
                    factory(App\Post::class, 5)->make()->toArray()
                );
            });
         Tworzy 3 uzytkownikow i dodaje dla kazdego po 5 postow  */








        /*  Inny sposob

          $users = factory(App\User::class, 3)->create();

           foreach ($users as $user) {
               factory(App\Post::class, 5)->create([
                   'user_id' => $user->id
               ]);
           }
          Inny sposob     */



















    }
}

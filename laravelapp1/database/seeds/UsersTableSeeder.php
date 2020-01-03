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














        // $users = App\User::all()->intersect(App\User::whereIn('id', [1, 2, 3,4,5,6,7])->get());
        //foreach ($users as $user)
        //$user->roles()->attach($userRole);
        //$userRole = Role::where('name','user')->first();





    }
}

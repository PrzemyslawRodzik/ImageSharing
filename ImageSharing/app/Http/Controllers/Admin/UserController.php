<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Profile;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',User::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id==$id){
            return redirect()->route('admin.users.index')->with('warning','No co ty? Nie mozesz edytowac swoich rol');
        }
        return view('admin.users.edit')->with([
            'user'=>User::find($id),
            'roles'=>Role::all(),
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (Auth::user()->id==$id){
            return redirect()->route('admin.users.index');
        }
        $user  = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success','Poprawnie dodano role dla uzytkownika');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id==$id){
            return redirect()->route('admin.users.index')->with('warning','No co ty? Nie mozesz sie wykasowac');
        }


        $arrayOfFiles = ( User::find($id)->posts()->count() >1 ) ?  User::find($id)->posts()->get()->pluck('image')->toArray() : User::find($id)->posts()->get()->pluck('image');


foreach ($arrayOfFiles as $path)
    unlink(storage_path('app/public/'.$path));








        DB::table('profile_user')->where('user_id', '=', $id)->delete();
        DB::table('role_user')->where('user_id', '=', $id)->delete();
        DB::table('profiles')->where('user_id', '=', $id)->delete();
        DB::table('posts')->where('user_id', '=', $id)->delete();





        User::destroy($id);



        return redirect()->route('admin.users.index')->with('success','Usunieto uzytkownika.');;
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //



    public function index($user)
    {

        $user = User::findOrFail($user);

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view('profiles.index',[
            'user' =>$user,
            'follows' =>$follows,

        ]);
    }

    public function edit(\App\User $user)
    {           $this->authorize('update',$user->profile);
            return view('profiles.edit',compact('user'));
    }

    /** @noinspection PhpUndefinedVariableInspection */
    public function update(\App\User $user)
    {
        $this->authorize('update',$user->profile);

        $data = request()->validate([
           'title' => 'required|min:3|max:50',
           'description' => 'required|min:10|max:100',
           'url' => 'url',
           'image' => '',


            ]);

        if(request('image')){



        $imagePath = request('image')->store('profile','public');



        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();




        auth()->user()->profile->update(array_merge(
            $data,['image'=>$imagePath]

        ));


        }
        else
        auth()->user()->profile->update($data);



        return redirect("/profile/{$user->id}");
    }
}

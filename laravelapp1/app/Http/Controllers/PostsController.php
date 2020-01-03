<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $users = auth()->user()->following()->pluck('profiles.user_id');
        //dd(auth()->user()->following()->pluck('profiles.user_id'));




        $posts = Post::whereIn('user_id',$users)->with('user')->latest()->paginate(3);

        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    { $data = request()->validate([
        'caption'=>'required|min:10|max:300',
        'image'=>['required','image'],


    ]);
    $imagePath = request('image')->store('uploads','public');


    $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
    $image->save();
    auth()->user()->posts()->create([
        'caption'=>$data['caption'],
        'image'=>$imagePath,

    ]);
    return redirect('/profile/'. auth()->user()->id);


    }

    public function show(\App\Post $post, \App\User $user)
    {


        $this->authorize('view',$post);

        return view('posts.show',[
            'post' =>$post,

            // mozna tez uzyc funkcji compact() , ktora dopasuje 'post'=>$post

        ]);
    }

    public function destroy($id)
    {
        if( ! Post::find($id) ){
             return redirect()->route('welcome')->with('warning','Post o takim id nie istnieje');
        }
        Post::destroy($id);
        return redirect()->route('profile.show', Auth::user()->id)->with('success','Usuwanie posta zakonczone powodzeniem.');

    }


}

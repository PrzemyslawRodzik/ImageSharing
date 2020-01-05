<?php



use App\Post;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/







/* Podglad email */

/*Route::get('/email',function (){

   return new \App\Mail\NewUserWelcomeMail();
});*/
/* Podglad email */

/* Strona startowa  */



Route::get('/',function (){
    return view('welcome');
})->name('welcome');
/* Strona startowa  */

Route::get('/users',function (){
    return view('users',[
        'users'=>\App\User::paginate(10),

    ]);
})->name('users');

/*Route::get('/deleteStorage',function (){


    return   File::deleteDirectory(public_path('storage/'));








});*/
/*Route::get('/artisan',function (){

    Artisan::call('storage:link');
    return Artisan::output();







});*/



/* Drogi do postow */
Route::get('/p/create','PostsController@create');
Route::post('/p','PostsController@store');
Route::get('/p/{post}','PostsController@show')->name('posts.show');
Route::post('follow/{user}','FollowsController@store');
Route::get('/p','PostsController@index')->name('posts.index'); // tablica follow postow
Route::delete('/p/{post}','PostsController@destroy')->name('posts.destroy')->middleware('auth');
/* Drogi do postow */

/* middleware('auth') */
Auth::routes();
Auth::routes();
/* middleware('auth') */

/* drogi do profili */
Route::get('/profile/{user}','ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit','ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}','ProfilesController@update')->name('profile.update');
/* drogi do profili */


/* panel administratora */
Route::namespace('Admin')->middleware(['auth','auth.admin'])->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/users','UserController',['except'=>['show','create','store']]);

});
/* panel administratora */




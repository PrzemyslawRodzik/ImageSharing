@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-8">

            <img src="/storage/{{$post->image}}"  class="w-100" alt="">
        </div>
        <div class="col-4">

            <div class="d-flex align-items-center">

                <div class="pr-3">
                    <img src="{{$post->user->profile->profileImage()}}" alt="" class="rounded-circle w-100" style="max-width: 50px">
                </div>

            <div class="d-flex">
                <div class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></div>
                <div class="pl-5">
                    <button onclick="{{$post->user->deleteChosenPost()}}">X</button></div>
            </div>








        </div>
            <hr>


            <p> <span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></span> {{$post->caption }}</p>


    </div>




</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">

            <img src="{{$user->profile->profileImage()}}" alt="" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">

<div class="d-flex align-items-center pb-3">
    <div class="pr-3 h4"> {{$user->username }}</div>
    <follow-button user-id="{{$user->id}}" follows="{{$follows}}">

    </follow-button>
</div>


                @can('update',$user->profile)
                    <a href="/p/create">Dodaj nowy post</a>
                @endcan


            </div>
            <div class="d-flex">

                <div class="pr-5"  ><strong>{{$user->posts->count()}}</strong>posts</div>
                <div class="pr-5" ><strong>{{$user->profile->followers->count()}}</strong>followers</div>
                <div class="pr-5" ><strong>{{$user->following->count()}}</strong>following</div>

            </div>
            @can('update',$user->profile)
            <a href="/profile/{{$user->id}}/edit">Dodaj informacje o profilu</a>
            @endcan
                <div class="pt-4 font-weight-bold">{{$user->profile->title ?? "N/A"}}</div>
            <div class="">{{$user->profile->description ?? "N/A"}}</div>
            <div> <a href="#">{{$user->profile->url ?? 'Nie podano'}}</a>   </div>


        </div>

    </div>


    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-lg-4 pb-4">
                @can('view',$post)
                <a href="/p/{{$post->id}}">
                    @endcan
                <img src="/storage/{{$post->image}}" class="w-100 img-fluid" alt="">
                </a>
            </div>
        @endforeach



    </div>
</div>
@endsection

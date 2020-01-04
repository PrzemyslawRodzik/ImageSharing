@extends('layouts.app')

@section('content')


    <style>

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
<div class="container">
    <div class="justify-content-center">
<div class="table-responsive">

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>




        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>




             <th> <a class="text-decoration-none " style="text-transform: uppercase; letter-spacing: .1rem;color: #636b6f;padding: 0 25px;font-size: 13px;font-weight: 600;"    href="/profile/{{$user->id}}">{{$user->username}} <---</a>







        </tr>

            @endforeach
        </tbody>
    </table>
</div>
        <div class="col-12 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection


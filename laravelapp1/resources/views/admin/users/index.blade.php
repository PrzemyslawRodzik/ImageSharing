@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Actions</th>



        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>

            <th>{{$user->username}}</th>
            <th>{{$user->email}}</th>
            <th>{{implode(' ',$user->roles()->get()->pluck('name')->toArray()) }}</th>
            <th>
                <a href="{{route('admin.users.edit',$user->id)}}" class="float-left">
                    <button type="button" class="btn btn-primary btn-sm">Edit</button>
                </a>
                <form action="{{route('admin.users.destroy',$user->id)}}" method="POST" class="float-left ml-3">
                   @csrf

                    {{method_field('DELETE')}}

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Jesteś pewien?')" >Delete</button>

                </form>

            </th>







        </tr>

            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection


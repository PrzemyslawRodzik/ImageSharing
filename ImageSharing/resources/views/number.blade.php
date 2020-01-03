@extends('layouts.app')

@section('content')
<div>
    @if (count($numbers) > 0)
        <h2>Happy numbers are: </h2>
        <ul>
            @foreach ($numbers as $element)
                <li>{{$element}}</li>
            @endforeach
        </ul>
    @else
        <h2>No happy numbers</h2>
    @endif
</div>
@endsection


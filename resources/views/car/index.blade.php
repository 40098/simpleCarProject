@extends('layout.app')

@section('body')

<table class="table">
    <tr>
        <th>Brand</th>
        <th>Type</th>
        <th>Comment</th>
        <th>Options</th>
    </tr>
    @forelse ($cars as $car)
    <tr>
       <td>{{$car->brands[$car->brand]}}</td> 
       <td>{{$car->type}}</td> 
       <td>{!!$car->comment!!}</td>
       <td><a href="{{route('car.show', $car->id)}}">Show</a></td>
    </tr>
    @empty
        <span>No records found</span>
    @endforelse
</table>

@endsection
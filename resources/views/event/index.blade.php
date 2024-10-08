@extends('layout.app')
@section('title', 'Events')
@section('content')

<div class="container">
  <h1>Events</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Date</th>
        <th scope="col">Available Tickets</th>
        <th scope="col">Price</th>
        <th scope="col">show</th>

      </tr>
    </thead>
    <tbody>
      @foreach($events as $event)
      <tr>
        <th scope="row">{{$event->id}}</th>
        <td>{{$event->name}}</td>
        <td>{{$event->title}}</td>
        <td>{{$event->description}}</td>
        <td>{{$event->date}}</td>
        <td>{{$event->availableTickets}}</td>
        <td>{{$event->price}}</td>
        <td><a href="{{route('events.show', $event->id)}}" class ="btn btn-primary">show</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

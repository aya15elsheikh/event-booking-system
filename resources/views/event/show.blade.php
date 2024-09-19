@extends('layout.app')
@section('title', 'show event')
@section('content')
<div class="container">
  <h1>Event Details</h1>
  <p><strong>Name: </strong> {{$event->name}}</p>
  <p><strong>description: </strong> {{$event->description}}</p>
  <p><strong>date: </strong> {{$event->date}}</p>
  <p><strong>price: </strong> {{$event->price}}</p>
  <p><strong>Available tickets: </strong> {{$event->availableTickets}}</p>
</div>
@endsection
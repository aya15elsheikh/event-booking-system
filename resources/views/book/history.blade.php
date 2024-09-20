@extends('layout.app')
@section('title', 'Booking History')
@section('content')

<div class="container">
  <h1>Booked Events</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Booking ID</th>
        <th scope="col">Event ID</th>
        <th scope="col">Event Name</th>
        <th scope="col">User Name</th>
        <th scope="col">Tickets</th>
      </tr>
    </thead>
    <tbody>
      @foreach($bookings as $booking)
      <tr>
        <th scope="row">{{$booking->id}}</th>
        <td>{{$booking->event_id}}</td>
        <td>{{$booking->event->name}}</td> 
        <td>{{$booking->user->name}}</td> 
        <td>{{$booking->tickets}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

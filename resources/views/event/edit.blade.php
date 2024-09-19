@extends('layout.app')
@section('title', 'Add Event')
@section('content')
<div class="container mt-5">
    <h2>Update Event</h2>
    <form action="{{ route('events.update', $event->id) }}" method="POST">
    @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$event->name}}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" value="{{$event->description }}" required></textarea>
        </div>

        <div class="form-group">
            <label for="tickets">Number of  Available Tickets</label>
            <input type="number" class="form-control" name="availableTickets" value="{{$event->availableTickets}}" required>
        </div>

        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="date" class="form-control" id="date" name="date"value="{{$event->date}}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{$event->price}}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection


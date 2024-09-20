@extends('layout.app')
@section('title', 'edit user')
@section('content')
<div class="container mt-5">
    <h2>User data</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
    @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
        </div>

        <div class="form-group">
            <label for="description">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required></input>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    {{$userId = Auth::id();}}
    @if ($userId===1)
      <a href="{{route('admin')}}" class ="btn btn-secondary"> Back to Admin panel</a>
    @endif
</div>
@endsection


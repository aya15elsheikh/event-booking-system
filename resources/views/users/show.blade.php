@extends('layout.app')
@section('title', 'show event')
@section('content')
<div class="container">
  <h1>My profile</h1>
  <p><strong>Name: </strong> {{$user->name}}</p>
  <p><strong>Email: </strong> {{$user->email}}</p> 
  <p><strong>Role: </strong> {{$user->role->name}}</p> 
 </div>
  @if ($user->role_id===1)
  <a href="{{route('admin')}}" class ="btn btn-secondary">Admin panel</a>
  @endif
  <a href="{{route('logout')}}" class ="btn btn-danger">logout</a>
@endsection
@extends('layout.login')
@section('title','register')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <form action="{{route ('register.post')}}" method="POST" class="ms-auto me-auto  " style="width: 500px">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User Name</label>
            <input type="name" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

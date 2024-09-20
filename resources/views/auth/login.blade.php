@extends('layout.login')

@section('title', 'Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <form action="{{ route('login.post') }}" method="POST" class="ms-auto me-auto" style="width: 500px;">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
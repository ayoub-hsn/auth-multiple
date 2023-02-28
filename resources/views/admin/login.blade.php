@extends('layouts.admin')

@section('content')
    <h1>Admin Login</h1>

    @if (session('loginError'))
        <div class="alert alert-danger">
            {{ session('loginError') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection

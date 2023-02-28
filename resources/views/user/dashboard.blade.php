@extends('layouts.user')

@section('content')
    <h1>User Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <form action="{{ route('users.logoutAsUser') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection

@extends('layouts.admin')

@section('content')
    <h1>User Accounts</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('admin.loginAsUser', $user->id) }}">Login as user</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User Dashboard</h2>
        <p>Welcome, {{ $userData->name }}!</p>
        <!-- Display other user-specific content here -->
    </div>
@endsection

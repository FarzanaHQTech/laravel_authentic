@extends('layouts.backend.main')

@section('page_content')

   
    <center>
        <h2>User Details</h2>
    <div class="card  " style="width: 18rem;  align-item:center">
        <img class="card-img-top" src="{{ asset('image/' . $user->photo) }}" alt="User Photo" style="width: 100%;  object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <p class="card-text">
                <strong>ID:</strong> {{ $user->id }}<br>
                <strong>Email:</strong> {{ $user->email }}<br>
                <strong>Role:</strong> {{ $user->role_id }}
            </p>
            <a href="{{ url('user') }}" class="btn btn-primary">Back to Users</a>
        </div>
    </div>
</center>

@endsection

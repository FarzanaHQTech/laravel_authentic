@extends('layouts.backend.main')
@section('page_content')
  
    <a href="{{url('user/create')}}" class="btn btn-primary">Add User</a>
    <table class="table table-striped">
        <tr>
            <th class="col">id</th>
            <th class="col">name</th>
            <th class="col">email</th>
            <th class="col">Role</th>
            <th class="col">Photo</th>
            <th class="col">action</th>
        </tr>

        @forelse ($users as $user)
            <tr>
                <td>
                    {{ $user['id'] }}
                </td>
                <td>
                    {{ $user['name'] }}
                </td>
                <td>
                    {{ $user['email'] }}
                </td>
                <td>
                    {{ $user['role_id'] }}
                </td>
                <td>
                    <img width="100" src="{{asset('image')}}/{{$user['photo']}}" alt="">
                </td>
                <td>
                    <a href="{{url('user')}}/{{$user['id']}}" class="btn btn-info">Edit</a>
                    {{-- <a href="{{url('user')}}/{{$user['id']}}" class="btn btn-info">Show </a> --}}
                    <a href="{{ url('user/' . $user['id']) }}" class="btn btn-info">Show</a>
                </td>
            </tr>
        @empty
        @endforelse



    </table>
@endsection

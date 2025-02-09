@extends('layouts.backend.main')
@section('page_content')
  
@if (session('success'))
    <div><span class="alert alert-success">{{session('success')}}</span></div>
@endif

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

                    {{ $user["role"]?$user->role->name: 'No role assign' }}
                    {{-- {{ $user->role ? $user->role->name : 'No Role Assigned' }} --}}

                    {{-- $user->role ? $user->role->name : 'No Role Assigned'  --}}
                </td>
                <td>
                    <img width="100" src="{{asset('image')}}/{{$user['photo']}}" alt="">
                </td>
                <td>
                    
                        <a href="{{url('user')}}/{{$user['id']}}/edit" class="btn btn-info">Edit</a>
                    
                    <a href="{{ url('user/' . $user['id']) }}" class="btn btn-warning">Show</a>
                       
                          <!-- Delete Form -->
                    <form action="{{ url('user/' . $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure  to delete this user?')">Delete</button>
                    </form>
                {{-- </form> --}}
                </td>
            </tr>

        @empty
        @endforelse



    </table>
    <div class="d-flex justify-content-end">
        {{!!$users->links( 'pagination::bootstrap-5')!!}}
    </div>
@endsection

@extends('layouts.backend.main')

@section('page_content')

<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Edit User</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit User Details</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('user.update', $user['id']) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')       
                         {{-- Use PATCH for updating data  --}}
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Username</label>
                            <div class="col-md-10">
                                <input type="hidden" name="id" value="{{ $user['id'] }}" >
                                <input type="text" class="form-control" name="name" value="{{ $user['name'] }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Email</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="email" value="{{ $user['email'] }}">
                            </div>
                            @error('email')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Role ID</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="role" value="{{ $user['role_id'] }}">
                            </div>
                            @error('role')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Password</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" name="password" value="{{ $user['password'] }}">
                            </div>
                            @error('password')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Upload Photo</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="photo">
                                <img width="100" src="{{ asset('image/' . $user['photo']) }}" alt="Current Photo">
                            </div>
                            @error('photo')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn btn-info" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

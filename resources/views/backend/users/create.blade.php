@extends('layouts.backend.main')
@section('page_content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Basic Inputs</h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Basic Inputs</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-2">Userame</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-2">Email</label>
                                <div class="col-md-10">
                                    <input type="test" class="form-control" name="email">
                                </div>
                                @error('email')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-md-2">Role </label>
                                <div class="col-md-10">
                                    {{-- <input type="test" class="form-control" name="role"> --}}
                                    <select name="role" id="" class="select-form form-control">
                                        <option value="">select Role</option>
                                        @foreach ($roles_name as $role_name)
                                        <option value="{{$role_name->id}}">{{$role_name->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                @error('role')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label class="col-form-label col-md-2">Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="password">
                                </div>
                                @error('password')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label col-md-2">Upload Photo</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="photo">
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

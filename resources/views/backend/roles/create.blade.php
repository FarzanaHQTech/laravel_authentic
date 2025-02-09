
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
                    <form action="{{route('role.store')}}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Id</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Admin</label>
                            <div class="col-md-10">
                                <input type="test" class="form-control" name="name">
                            </div>
                            @error('name')
                                <span style="color: red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                           
                        </div>
                        <button class="btn btn-info" type="submit">Submit</button>
                    </form>
                </div>
            </div>

          

        </div>
    </div>
</div>
@endsection
            {{-- <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Input Sizes</h5>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Large Input</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-lg" placeholder=".form-control-lg">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-2">Default Input</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder=".form-control">
                            </div>
                        </div>
                        <div class="mb-3 mb-0 row">
                            <label class="col-form-label col-md-2">Small Input</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control form-control-sm" placeholder=".form-control-sm">
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
      
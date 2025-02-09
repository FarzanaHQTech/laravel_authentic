
@extends('layouts.backend.main')
@section('page_content')

@php
    // print_r($roles);
@endphp
    <div class="card">
        <div class="card-header justify-content-between">
            <div class="card-title">
                Striped columns
            </div>
            <div>
                <a href="{{url("role/create")}}" class="btn btn-primary">Add Role</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table  table-striped">
                    <thead>
                        
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Role name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role )
                        <tr>
                            <th scope="row">{{$role['id']}}</th>
                            <td>{{$role['name']}}</td>
                       
                            <td>
                                <button class="btn btn-sm btn-danger btn-wave waves-effect waves-light">
                                    <i class="feather-trash align-middle me-2 d-inline-block"></i>Delete
                                </button>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                      
                       
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    
    @endsection
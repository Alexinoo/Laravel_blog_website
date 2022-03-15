@extends('layouts.master')

@section('title', 'View Users')

@section('content')

 <div class="container-fluid px-4">

    <div class="card mt-2" >

        <div class="card-header">
                     <h4 >View Users</h4>
        </div>
        <div class="card-body">
            
               @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->role_as == 1 ? 'Admin' : 'User'}}</td>
                                    <td>
                                        <a href="{{ url('admin/user/'. $user->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                    

              </div>    
    
@endsection
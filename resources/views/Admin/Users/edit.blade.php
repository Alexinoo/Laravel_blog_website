@extends('layouts.master')

@section('title', 'Edit User')

@section('content')


 <div class="container-fluid px-4">

    <div class="card mt-2">

        <div class="card-header">
            <h4> Edit User

                <a href="{{url('admin/users')}}" class="btn btn-primary float-end">Back</a>

            </h4>
        </div>

        <div class="card-body">
            
              @if($errors->any())
                            <div class="alert alert-danger">
                                 @foreach($errors->all() as $error)
                                <div class="">{{ $error}}</div>
                            @endforeach
                            </div>  
                            @endif

            <form action="{{ url('admin/update-user/'.$user->id)}}" method="POST">
                @csrf
                @method('put')

              

                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update user</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>

 </div>

 @endsection
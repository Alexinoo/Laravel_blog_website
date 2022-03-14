@extends('layouts.master')

@section('title', 'View Posts')

@section('content')


 <div class="container-fluid px-4">

    <div class="card mt-2">
        <div class="card-header">
            <h4> View Posts

                <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Posts</a>

            </h4>
        </div>

        <div class="card-body">
                @if(session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>

                            {{-- Added category function in the Posts model --}}
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->name}}</td>
                            <td>{{$post->status == 1 ? 'Hidden' : 'Visible'}}</td>
                            <td>
                                <a href="{{ url('admin/post/'.$post->id )}}" class="btn btn-primary btn-sm">Edit</a>
                            </td>                           
                        </tr>
                        @endforeach
                      
                    </tbody>
                </table>
        </div>
    </div>

 </div>

 @endsection
@extends('layouts.master')

@section('title', 'Category')

@section('content')


 <div class="container-fluid px-4">

    <div class="card mt-2" >

        <div class="card-header">
                     <h4 >View Category

                        <a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
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
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                        <tr>
                                             <td>{{$category->id }}</td>
                                             <td>{{$category->name }}</td>
                                             <td>
                                                 <img src="{{ asset('uploads/category/'.$category->image)}}" alt="Img" width="70px" height="50px">
                                            </td>
                                             <td>{{$category->status == 1 ? 'Hidden' : 'Shown'}}</td>
                                             <td>
                                                 <a href="{{ url('admin/edit-category/'.$category->id )}}" class="btn btn-primary btn-sm">Edit</a>
                                             </td>
                                             <td>
                                                 <a href="{{ url('admin/delete-category/'.$category->id )}}" class="btn btn-danger btn-sm">Delete</a>
                                             </td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>

                    </div>
                </div>
                    

              </div>    

    
@endsection
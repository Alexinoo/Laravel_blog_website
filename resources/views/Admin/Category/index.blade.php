@extends('layouts.master')

@section('title', 'Category')

@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{ url('admin/delete-category')}}" method="POST">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Category with its posts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                     <div class="modal-body">
                    <input type="hidden" name="category_delete_id" id="category_id" />
                    <h6>Are you sure you want to delete this Category with all it's posts.?</h6>
                     </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


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

                        <table class="table table-bordered" id="myDataTable">
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
                                                 {{-- <a href="{{ url('admin/delete-category/'.$category->id )}}" class="btn btn-danger btn-sm">Delete</a> --}}
                                                 <button type ="button" value = "{{ $category->id  }}"class="btn btn-danger deleteCategoryBtn ">Delete</button>


                                             </td>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>

                    </div>
                </div>
                    

              </div>    

    
@endsection

@section('scripts')

<script>
    $(document).ready(function(){

        // $('.deleteCategoryBtn').click(function(e){ //Does not work with pagination - Use on instead
            $(document).on('click', '.deleteCategoryBtn' , function(e){

                 e.preventDefault();

                let category_id =   $(this).val();

                $('#category_id').val(category_id);

                $('#deleteModal').modal('show');

            })        
    })
</script>
    
@endsection
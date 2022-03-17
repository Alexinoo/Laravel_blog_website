@extends('layouts.app')

@section('title', "Blogging Website")
@section('meta_description', "Blogging Website")
@section('meta_keyword', "Blogging Website")

@section('content')

<div class="bg-danger py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

               <div class="owl-carousel category-carousel owl-theme">

                @foreach($categories as $category)    
                   <div class="item">
                       <a href="{{ url('tutorial/'.$category->slug)}}" class="text-decoration-none">                      
                       <img src="{{ asset('uploads/category/'.$category->image)}}" alt="Image" class="w-100" />
                       <div class="card ">
                           <div class="card-body text-center">
                               <h5 class="text-dark">{{ $category->name }} </h5>
                           </div>
                       </div>
                        </a>
                   </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
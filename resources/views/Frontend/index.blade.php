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

{{-- Advertising --}}
<div class="py-1 bg-gray">
    <div class="container">
        <div class="border text-center p-3">
            <h3>Advertise here</h3>
        </div>
    </div>
</div>

{{-- About us section--}}
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Coding Pro</h4>
                <div class="underline"></div>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum pariatur et asperiores dolorem, ducimus repellat laborum adipisci numquam in aliquid.

                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas possimus error temporibus totam illum facere magni, vel quis minus inventore.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- Categories section--}}
<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All Categories List</h4>
                <div class="underline"></div>
            </div>

            @foreach($categories as $category)    
            <div class="col-md-3">
                  <div class="card card-body mb-3">
                      <a href="{{ url('tutorial/'.$category->slug)}}" class="text-decoration-none">
                          <h4 class="text-dark mb-0">{{ $category->name}}</h4>
                      </a>
                  </div>                                 
            </div>
         @endforeach 

        </div>
    </div>
</div>

{{-- Posts section--}}
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Latest Posts</h4>
                <div class="underline"></div>
            </div>

            <div class="col-md-8">
                   @foreach($latest_posts as  $latest_post) 
                            <div class="card card-body bg-gray shadow mb-3">
                                    <a href="{{ url('tutorial/'.$latest_post->category->slug.'/'.$latest_post->slug)}}" class="text-decoration-none">
                                         <h4 class="text-dark mb-0">{{ $latest_post->name}}</h4>
                                </a>
                                <h6>Posted On : {{ $latest_post->created_at->format('d-m-Y')}}</h6>
                            </div>    
                      @endforeach 
                 </div>

                    <div class="col-md-4">
                        <div class="border text-center p-3">
                                <h3>Advertise here</h3>
                        </div>
                    </div>   
            </div>
        </div>
    </div>


@endsection
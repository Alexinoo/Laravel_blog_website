@extends('layouts.app')

{{-- SEO Tags --}}

@section('title', " $post->meta_title")
@section('meta_description', " $post->meta_description")
@section('meta_keyword', " $post->meta_keyword")

@section('content')

<div class="py-4">
    <div class="container">
        <div class="row">

            <div class="col-md-8">

                   <div class="category-heading">
                    <h4>{!! $post->name !!}</h4>
                </div>
                  <div>
                        <h6>{{$post->category->name . ' / '. $post->name }}</h6>
                    </div>
                    
                <div class="card card-shadow mt-4">
                    <div class="card-body post-description">
                          {!! $post->description !!}
                    </div>
                    
                  
                </div>
            </div>

              <div class="col-md-4">
                <div class="border p-2 my-2">
                    <h4>Advertising area</h4>
                </div>
                <div class="border p-2 my-2">
                    <h4>Advertising area</h4>
                </div>
                <div class="border p-2 my-2">
                    <h4>Advertising area</h4>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Latest Posts</h4>
                    </div>
                    <div class="card-body">
                        @foreach($latest_posts as $latest_post)

                        {{-- Direct to that tutorial --}}
                        <a href="{{ url('tutorial/'.$latest_post->category->slug. '/'.$latest_post->slug)}}" class="text-decoration-none">
                            <h6> > {{ $latest_post->name }}</h6>
                        </a>
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
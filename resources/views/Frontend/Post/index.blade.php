@extends('layouts.app')

{{-- SEO Tags --}}

@section('title', " $category->meta_title")
@section('meta_description', " $category->meta_description")
@section('meta_keyword', " $category->meta_keyword")

@section('content')

<div class="py-4">
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                   <div class="category-heading">
                    <h4>{{ $category->name }}</h4>
                </div>

                @forelse($posts as $post )                  
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <a href=" {{ url('tutorial/'.$category->slug.'/'.$post->slug ) }}" class="text-decoration-none">
                            <h2 class="post-heading">{{$post->name}}</h2>
                        </a>
                        <h6>Posted by {{ $post->user->name }}  
                            <span class="ms-1">on {{ $post->created_at->format('d-m-Y') }}</span>
                        </h6>
                    </div>
                </div>
               
                 @empty
                   <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h1 >No post available</h1>
                    </div>
                </div>                    
                @endforelse

                 <div class="your-paginate mt-3 float-end">
                    {{ $posts->links() }}
                </div>

            </div>

            <div class="col-md-3">
                <div class="border p-2">
                    <h4>Advertising area</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
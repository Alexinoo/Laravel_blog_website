@extends('layouts.app')

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
                        <a href=" {{ url('tutorial/'.$category->slug.'/'.$post->slug ) }}">
                            <h2 class="post-heading">{{$post->name}}</h2>
                        </a>
                    </div>
                </div>
                 @empty
                   <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h1 >No post available</h1>
                    </div>
                </div>                    
                @endforelse

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
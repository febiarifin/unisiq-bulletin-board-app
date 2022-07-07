@extends('layouts.home')

@section('content')

<div class="container pt-5">
    <p class="fs-5 fw-semibold">{{ $title }}</p>
    <div class="row mt-4 pb-5 box-all-post">
        @foreach ($posts as $post)
        <div class="col-md-4 mb-4 d-flex justify-content-center">
            <a href="{{ url('/post/'.$post->user.'/'.$post->slug) }}" class="text-decoration-none">
                <div class="card shadow" style="width: 22rem;">
                    <img src="{{ asset($post->image) }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="text-black fs-5 fw-semibold">{{ Str::substr($post->title,0,20) }}...</p>
                        <a href="{{ url('/post/user/'.$post->user) }}" class="text-decoration-none link-secondary">
                            <i class="bi bi-person-fill"></i> {{ $post->user }}</a>
                        <p class="text-secondary">{{ Str::substr($post->content,0,50) }}...</p>
                        <div class="row">
                            <div class="col-5">
                                <a href="{{ url('/post/category/'.Str::slug($post->category)) }}"
                                    class="text-decoration-none">
                                    <div class="my-badge">{{ $post->category }}</div>
                                </a>
                            </div>
                            <div class="col-7 mt-1">
                                <p class="float-right text-secondary">{{ $post->created_at->format('d M y h:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    {{ $posts->links() }}

</div>

@endsection
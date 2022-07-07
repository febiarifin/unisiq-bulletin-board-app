@extends('layouts.home')

@section('content')
<div class="box-header text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-2">
                <h1>APP Name</h1>
                <p class="fs-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure id sint sed et
                    saepe architecto in praesentium. Dignissimos autem dolorum nostrum dolor dolorem reiciendis
                    magnam voluptates voluptatem? Possimus, est non.</p>
            </div>

            <div class="col-md-6">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach ($postRandom as $post)
                        <div class="carousel-item active">
                            <a href="">
                                <img src="{{ asset($post->image) }}" class="d-block w-100" alt="{{ $post->title }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ Str::substr($post->title,0,30) }}</h5>
                                    <p>{{ Str::substr($post->content,0,50) }}...</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <p class="fs-5 fw-semibold mt-5">All post</p>
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
@extends('layouts.home')

@section('content')

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-md-9">
            <div class="bg-white p-4 mb-4 box-preview">
                <a href="{{ route('dashboard') }}" class="text-decoration-none link-primary fs-6">Post / </a>{{
                $post->slug
                }}
                <img src="{{ asset($post->image) }}" class="img-fluid mt-3 mb-3" alt="">
                <div class="mt-2">
                    <p class="fw-semibold fs-4">{{ $post->title }}</p>
                    <a href="{{ url('/post/user/'.$post->user) }}" class="text-decoration-none link-secondary">
                        <i class="bi bi-person-fill"></i> {{ $post->user }}</a>
                    <a href="{{ url('/post/category/'.Str::slug($post->category)) }}"
                        class="text-decoration-none link-secondary">
                        <i class="bi bi-tags-fill"></i> {{ $post->category }}</a>
                    <a href="#" class="text-decoration-none link-secondary">
                        <i class="bi bi-alarm-fill"></i> {{ $post->created_at->format('d M y') }}</a>
                </div>
                <hr>
                <div class="mt-3">
                    <div class="text-break mb-5">
                        {!! nl2br($post->content) !!}
                    </div>
                    <p class="fw-semibold">Lampiran</p>
                    <hr>
                    <a href="{{ $post->attachment }}" class="btn btn-outline-primary btn-sm" target="_blank"><i
                            class="bi bi-paperclip"></i>
                        {{ $post->attachment }}</a>
                </div>
            </div>

        </div>

        <div class="col-md-3">
            <div class="bg-white p-3 box-new-post text-center" id="box-label-preview">
                <h3>Preview</h3>
            </div>
        </div>
    </div>

</div>
@endsection
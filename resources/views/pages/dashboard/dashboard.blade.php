@extends('layouts.dashboard')

@section('content')

@if (Auth::user()->status ==='banned')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Perhatian!</strong> Akun anda dibanned oleh admin, silahkan hubungi admin jika akun ingin diaktifkan
    kembali!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    <div class="col-lg-3">
        <div class="card shadow">
            <div class="card-body text-center">
                <div class="bg-light-primary p-3 rounded">
                    <i class="fa fa-tags"></i>
                    Status
                    @if (Auth::user()->status === 'active')
                    <h2 class="bg-success rounded text-white">{{ Auth::user()->status }}</h2>
                    @else
                    <h2 class="bg-danger rounded text-white">{{ Auth::user()->status }}</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Category -->
    @foreach ($categories as $category)
    <div class="col-lg-3">
        <div class="card shadow">
            <div class="card-body text-center">
                <div class="bg-light-info p-3 rounded">
                    <i class="fa fa-tags"></i>
                    {{ $category->name }}
                    <h2>{{ $controller::countPostCategory($category->name)}}</h2>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <!-- Start Notification -->
    <div class="col-lg-6 col-md-12">
        <div class="card card-body mailbox">
            <h5 class="card-title">Postingan Publish : <strong>{{ $countPostPublish }}</strong></h5>
            <div class="message-center" style="height: 420px !important;">
                <!-- post -->
                @foreach ($postPublish as $post)
                <a href="">
                    <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                    <div class="mail-contnet">
                        <h6 class="text-dark font-medium mb-0">{{ Str::substr($post->title,0,35) }}...</h6>
                        <span class="label label-success">{{ $post->category }}</span>
                        <span class="time">{{ $post->created_at}}</span>
                    </div>
                </a>
                @endforeach
                <div class="text-center">
                    <a href="{{ route('posts') }}" class="text-decoration-none">Show all...</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Notification -->
    <!-- Start Feeds -->
    <div class="col-lg-6">
        <div class="card card-body mailbox">
            <h5 class="card-title">Postingan Arsip : <strong>{{ $countPostArsip }}</h5>
            <div class="message-center" style="height: 420px !important;">
                <!-- post -->
                @foreach ($postArsip as $post)
                <a href="">
                    <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                    <div class="mail-contnet">
                        <h6 class="text-dark font-medium mb-0">{{ Str::substr($post->title,0,35) }}...</h6>
                        <span class="label label-warning">{{ $post->category }}</span>
                        <span class="time">{{ $post->created_at}}</span>
                    </div>
                </a>
                @endforeach
                <div class="text-center">
                    <a href="{{ route('posts') }}" class="text-decoration-none">Show all...</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Feeds -->
</div>

@endsection
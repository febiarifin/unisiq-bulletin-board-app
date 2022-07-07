@extends('layouts.home')

@section('content')

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-md-9">
            <div class="bg-white p-4 mb-4 box-content">
                <a href="{{ route('home') }}" class="text-decoration-none link-primary fs-6">Home / </a>{{ $post->slug
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
                    <a href="#" class="text-decoration-none link-secondary">
                        <i class="bi bi-chat-dots-fill"></i>
                        <a class="link-secondary"
                            href="{{ url('/post/'.$post->user.'/'.$post->slug) }}#disqus_thread">coments
                        </a>
                    </a>
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

            <div class="p-4 bg-white box-comment">
                <p class="fw-semibold">Komentar</p>
                <hr>
                <div id="disqus_thread"></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="bg-white p-2 box-new-post">
                <p class="fw-semibold">Informasi terbaru</p>
                <hr>
                @foreach ($posts as $post)
                <a href="{{ url('/post/'.$post->user.'/'.$post->slug) }}" class="text-decoration-none">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset($post->image) }}" class="img-fluid rounded-start"
                                    alt="{{ $post->title }}">
                            </div>
                            <div class="col-md-8">
                                <p class="m-1 fw-semibold text-dark">{{ Str::substr($post->title,0,12) }}...</p>
                                <p class="card-text m-1"><small class="text-muted">{{ $post->created_at->format('d M y
                                        h:i')
                                        }}</small></p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

</div>

<!-- Disquss -->
<script>
    (function () {
        var d = document,
            s = d.createElement('script');
        s.src = 'https://unsiq-bulletin-board.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
        Disqus.</a></noscript>

<script id="dsq-count-scr" src="//unsiq-bulletin-board.disqus.com/count.js" async></script>

@endsection
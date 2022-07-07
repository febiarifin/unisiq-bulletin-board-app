@extends('layouts.dashboard')

@section('content')

<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Post</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Kategori</th>
                                <th>Image</th>
                                <th>Lampiran</th>
                                @if (Auth::user()->role === 'admin')
                                <th>User</th>
                                @else
                                <th>Status</th>
                                @endif
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if ($post->status === 'publish')
                                    <a href="{{ url('/post/'.$post->user.'/'.$post->slug) }}" target="_blank">{{
                                        Str::substr($post->title,0,25) }}</a>
                                    @else
                                    <a href="{{ url('/post/preview/'.$post->user.'/'.$post->slug) }}" target="_blank">{{
                                        Str::substr($post->title,0,25) }}</a>
                                    @endif
                                </td>
                                <td>{{ $post->category}}</td>
                                <td><a href="{{ asset($post->image) }}" target="_blank">Show</a></td>
                                <td>
                                    @if ($post->attachment !== null)
                                    <a href="{{ $post->attachment }}" target="_blank">Show</a>
                                    @endif
                                </td>
                                @if (Auth::user()->role === 'admin')
                                <td>{{ $post->user }}</td>
                                @else
                                <td>
                                    @if ($post->status ==='publish')
                                    <span class="label label-success label-rounded">{{ $post->status }}</span>
                                    @else
                                    <span class="label label-warning label-rounded">{{ $post->status }}</span>
                                    @endif
                                </td>
                                @endif
                                <td>
                                    <div class="row">
                                        @if (Auth::user()->role === 'admin')
                                        <div class="col-md-4">
                                            <form action="{{ route('postArsip') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $post->id }}">
                                                <input type="hidden" name="user" value="{{ $post->user }}">
                                                <button class="btn-warning btn-sm" type="submit"
                                                    onclick="confirmArsip()">Arsip</button>
                                            </form>
                                        </div>
                                        @endif

                                        @if (Auth::user()->role === 'user')
                                        @if ($post->status === 'arsip')
                                        <div class="col-md-4">
                                            <form action="{{ route('postPublish') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $post->id }}">
                                                <input type="hidden" name="user" value="{{ $post->user }}">
                                                <button class="btn-success btn-sm" type="submit"
                                                    onclick="confirmPublish()">Publish</button>
                                            </form>
                                        </div>
                                        @else
                                        <div class="col-md-4">
                                            <form action="{{ route('postArsip') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $post->id }}">
                                                <input type="hidden" name="user" value="{{ $post->user }}">
                                                <button class="btn-warning btn-sm" type="submit"
                                                    onclick="confirmArsip()">Arsip</button>
                                            </form>
                                        </div>
                                        @endif

                                        <div class="col-md-4">
                                            <form action="{{ route('postEdit') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $post->id }}">
                                                <button class="btn-primary btn-sm" type="submit"> <i
                                                        class="fa fa-pencil-square-o"></i>
                                                    Edit</button>
                                            </form>
                                        </div>
                                        <div class="col-md-4">
                                            <form action="{{ route('postDelete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $post->id }}">
                                                <button class="btn-danger btn-sm" type="submit"
                                                    onclick="confirmDelete()"> <i class="fa fa-trash-o"></i>
                                                    Delete</button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

@if (Auth::user()->role ==='user')
<a href="{{ route('postCreate') }}" class="btn btn-primary shadow rounded-circle button-add"><i
        class="fa fa-plus"></i></a>
@endif

@endsection
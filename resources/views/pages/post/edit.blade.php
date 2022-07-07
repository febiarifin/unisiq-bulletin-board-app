@extends('layouts.dashboard')

@section('content')

<div class="col-lg-12 col-xlg-9 col-md-7">
    <div class="card">
        <!-- Tab panes -->
        <div class="card-body">
            <form class="form-horizontal form-material mx-2" action="{{ route('postUpdate') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$post->id}}">
                <div class="form-group">
                    <label class="col-md-12">Judul</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Input post title..." name="title"
                            class="form-control form-control-line @error('title') is-invalid @enderror"
                            value="{{ $post->title }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Konten</label>
                    <input id="x" type="hidden" name="content" value="{{ $post->content }}">
                    <trix-editor input="x"></trix-editor>
                    @error('content')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label class="col-sm-12">Pilih Kategori</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line @error('category') is-invalid @enderror"
                                    name="category" required>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->name }}" {{ $category->name === $post->category ?
                                        'selected' :'' }}>{{ $category->name }}</option>
                                    @endforeach
                                    @error('category')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Lampiran</label>
                            <div class="col-sm-12">
                                <input type="text" placeholder="Input link attachment..." name="attachment"
                                    class="form-control form-control-line" value="{{ $post->attachment }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Status</label>
                            <div class="col-sm-12">
                                <select class="form-control form-control-line @error('status') is-invalid @enderror"
                                    name="status" required>
                                    <option value="publish" {{ $post->status === 'publish' ?
                                        'selected' :'' }}>Publish</option>
                                    <option value="arsip" {{ $post->status === 'arsip' ?
                                        'selected' :'' }}>Arsip</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label class="col-sm-12">Gambar</label>
                            <div class="col-sm-12">
                                <input type="file" placeholder="choose image..." name="image" id="image"
                                    class="form-control form-control-line @error('image') is-invalid @enderror"
                                    onchange="previewFile()">
                                @error('image')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <img class="file-preview" src="{{ asset($post->image) }}" alt="Image post" height="155"
                                    width="260">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
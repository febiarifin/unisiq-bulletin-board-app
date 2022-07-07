@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="fs-6"><strong>Tambah Kategori</strong></p>
                <form action="{{ route($form) }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $categoryId }}">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Input category name..." value="{{ $categoryName }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Kategori</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <form action="{{ route('categoryEdit') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                                <button class="btn-primary btn-sm" type="submit"> <i
                                                        class="fa fa-pencil-square-o"></i>
                                                    Edit</button>
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="{{ route('categoryDelete') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                                <button class="btn-danger btn-sm" type="submit"
                                                    onclick="confirmDelete()"> <i class="fa fa-trash-o"></i>
                                                    Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
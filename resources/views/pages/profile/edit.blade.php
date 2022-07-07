@extends('layouts.dashboard')

@section('content')

<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="mt-4"> <img
                        src="{{ $user->image !== null ? asset($user->image) : asset('assets/img/default-profile.png') }}"
                        class="img-circle file-preview" width="150" />
                    <h4 class="card-title mt-2">{{ $user->name }}</h4>
                    <h6 class="card-subtitle">{{ $user->email }}</h6>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fa fa-user"></i>
                                <font class="font-medium">254</font>
                            </a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="fa fa-camera"></i>
                                <font class="font-medium">54</font>
                            </a></div>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
                <form class="form-horizontal form-material mx-2" action="{{ route('userUpdate')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <input type="hidden" name="old_password" value="{{ $user->password }}">
                    <div class="form-group">
                        <label class="col-md-12">Username</label>
                        <div class="col-md-12">
                            <input type="text"
                                class="form-control form-control-line @error('name') is-invalid @enderror" name="name"
                                value="{{ $user->name }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email"
                                class="form-control form-control-line @error('email') is-invalid @enderror" name="email"
                                value="{{ $user->email }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">New Password</label>
                        <div class="col-md-12">
                            <input type="password" placeholder="Input new password..."
                                class="form-control form-control-line @error('password') is-invalid @enderror"
                                name="password">
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">New photo profile</label>
                        <div class="col-md-12">
                            <input type="file"
                                class="form-control form-control-line @error('image') is-invalid @enderror" name="image"
                                id="image" onchange="previewFile()">
                            @error('image')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="confirmLogout()"><i
                            class="fa fa-sign-out"></i> Logout</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>

@endsection
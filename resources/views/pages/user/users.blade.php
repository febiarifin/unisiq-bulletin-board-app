@extends('layouts.dashboard')

@section('content')

<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel User</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($user->status ==='active')
                                    <span class="label label-success label-rounded">{{ $user->status}}</span>
                                    @else
                                    <span class="label label-danger label-rounded">{{ $user->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->status === 'active')
                                    <div class="col-md-3">
                                        <form action="{{ route('userBanned') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button class="btn-danger btn-sm" type="submit" onclick="confirmBanned()">
                                                Banned</button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="col-md-3">
                                        <form action="{{ route('userActivated') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button class="btn-success btn-sm" type="submit"
                                                onclick="confirmActivated()">Activated</button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
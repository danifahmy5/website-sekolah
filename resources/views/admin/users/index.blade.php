@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Users</h1>
                    <div>
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Users</li>
                            </ol>
                        </nav>

                    </div>
                    <div class="col-6">
                        <form action="" method="get">
                            <input type="search" style="width: 200px;float:right" placeholder="search..." name="s"
                                id="search" class="form-control" value="{{ request('s') }}">

                        </form>
                    </div>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-info mt-1">{{ Session::get('message') }}</div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{ $loop->index + 1 * request('page', 1) * 10 - 10 + 1 }}</td>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <a onclick="confirm('yakin akan menghapus data??') ?  document.getElementById('delete-user-{{ $user->id }}').submit() : null
                                        "
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                id="delete-user-{{ $user->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}

            </div>


        </div>

    </div>
@endsection

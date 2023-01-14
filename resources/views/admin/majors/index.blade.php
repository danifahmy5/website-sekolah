@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Jurusan</h1>
                    <div>
                        <a href="{{ route('majors.create') }}" class="btn btn-primary">Tambah Jurusan</a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">majors</li>
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
                @if (Session::has('error'))
                    <div class="alert alert-danger mt-1">{{ Session::get('error') }}</div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Subjudul</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($majors as $major)
                            @php
                                // $page = request('page');
                            @endphp
                            <tr>
                                <td scope="row">{{ $loop->index + 1 * request('page', 1) * 10 - 10 + 1 }}</td>
                                <td>{{ $major->title }}</td>
                                <td>{{ $major->subtitle }}</td>
                                <td>{{ strlen($major->description) < 31 ? $major->description : substr($major->description, 0, 30) . '....' }}
                                </td>
                                <td>{{ $major->status ? 'aktif' : 'tidak aktif' }}</td>
                                <td>
                                    <a href="{{ route('majors.show', $major->id) }}" class="btn btn-info btn-sm">Detail</a>

                                    @if ($major->status)
                                        <button
                                            onclick="document.getElementById('toggle-major-{{ $major->id }}').submit()"
                                            class="btn btn-warning btn-sm">
                                            Nonaktif
                                        </button>
                                    @else
                                        <a onclick="document.getElementById('toggle-major-{{ $major->id }}').submit()"
                                            class="btn btn-primary btn-sm">
                                            Aktif
                                        </a>
                                    @endif
                                    <a href="{{ route('majors.edit', $major->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <a onclick="confirm('yakin akan menghapus data??') ?  document.getElementById('delete-major-{{ $major->id }}').submit() : null
                                        "
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <form method="POST" action="{{ route('majors.destroy', $major->id) }}"
                                id="delete-major-{{ $major->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <form method="POST" action="{{ route('toggle.majors', $major->id) }}"
                                id="toggle-major-{{ $major->id }}">
                                @csrf
                                @method('PUT')
                            </form>
                        @endforeach
                    </tbody>
                </table>
                {{ $majors->links() }}

            </div>


        </div>

    </div>
@endsection

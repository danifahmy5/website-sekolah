@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Guru</h1>
                    <div>
                        <a href="{{ route('teacher.create') }}" class="btn btn-primary">Tambah Guru</a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teacher</li>
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
                            <th>Jurusan</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            @php
                                // $page = request('page');
                            @endphp
                            <tr>
                                <td scope="row">{{ $loop->index + 1 * request('page', 1) * 10 - 10 + 1 }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->major }}</td>
                                <td>{{ $teacher->phone }}</td>
                                <td>
                                    <a href="{{ route('teacher.show', $teacher->id) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('teacher.edit', $teacher->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <a onclick="confirm('yakin akan menghapus data??') ?  document.getElementById('delete-teacher-{{ $teacher->id }}').submit() : null
                                        "
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <form method="POST" action="{{ route('teacher.destroy', $teacher->id) }}"
                                id="delete-teacher-{{ $teacher->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endforeach
                    </tbody>
                </table>
                {{ $teachers->links() }}

            </div>


        </div>

    </div>
@endsection

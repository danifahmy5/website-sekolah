@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Kategori Blog</h1>
                    <div>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td width="50" scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status ? 'aktif' : 'tidak akhir' }}</td>
                                <td width="200">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    @if ($category->status)
                                        <a onclick="confirm('yakin akan menonaktifkan data??') ?  document.getElementById('delete-category-{{ $category->id }}').submit() : null
                                        "
                                            class="btn btn-danger btn-sm">Tidak Akhir</a>
                                    @else
                                        <a onclick="confirm('yakin akan mengaktifkan data??') ?  document.getElementById('delete-category-{{ $category->id }}').submit() : null
                                        "
                                            class="btn btn-info btn-sm">Aktifkan</a>
                                    @endif
                                </td>
                            </tr>
                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}"
                                id="delete-category-{{ $category->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}

            </div>


        </div>

    </div>
@endsection

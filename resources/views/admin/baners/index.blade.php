@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Baner Promosi</h1>
                    <div>
                        <a href="{{ route('baners.create') }}" class="btn btn-primary">Tambah Baner Promosi</a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Baners</li>
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
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($baners as $baner)
                            @php
                                // $page = request('page');
                            @endphp
                            <tr>
                                <td scope="row">{{ $loop->index + 1 * request('page', 1) * 10 - 10 + 1 }}</td>
                                <td>{{ $baner->title }}</td>
                                <td><a target="_blank" href="{{ $baner->link }}">{{ $baner->link }}</a></td>
                                <td>{{ $baner->status ? 'aktif' : 'tidak aktif' }}</td>
                                <td>
                                    <a href="{{ route('baners.show', $baner->id) }}" class="btn btn-info btn-sm">Detail</a>

                                    @if ($baner->status)
                                        <button
                                            onclick="document.getElementById('toggle-baner-{{ $baner->id }}').submit()"
                                            class="btn btn-warning btn-sm">
                                            Nonaktif
                                        </button>
                                    @else
                                        <a onclick="document.getElementById('toggle-baner-{{ $baner->id }}').submit()"
                                            class="btn btn-primary btn-sm">
                                            Aktif
                                        </a>
                                    @endif
                                    <a href="{{ route('baners.edit', $baner->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <a onclick="confirm('yakin akan menghapus data??') ?  document.getElementById('delete-baner-{{ $baner->id }}').submit() : null
                                        "
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <form method="POST" action="{{ route('baners.destroy', $baner->id) }}"
                                id="delete-baner-{{ $baner->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <form method="POST" action="{{ route('toggle.baners', $baner->id) }}"
                                id="toggle-baner-{{ $baner->id }}">
                                @csrf
                                @method('PUT')
                            </form>
                        @endforeach
                    </tbody>
                </table>
                {{ $baners->links() }}

            </div>


        </div>

    </div>
@endsection

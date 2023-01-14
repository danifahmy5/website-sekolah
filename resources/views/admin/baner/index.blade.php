@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Baner</h1>
                    <div>
                        <a href="{{ route('baners.create') }}" class="btn btn-primary">Tambah baner</a>

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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($baners as $baner)
                            <tr>
                                <td scope="row">{{ $loop->index + 1 * request('page', 1) * 10 - 10 + 1 }}</td>
                                <td>{{ $baner->title }}</td>
                                <td><a href="{{ $baner->link }}">{ $baner->link }}</a>{</td>
                                <td>{{ $baner->status ? 'aktif' : 'tidak aktif' }}</td>
                                <td>
                                    <a href="{{ route('baners.show', $baner->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('baners.edit', $baner->id) }}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $banerss->links() }}

            </div>


        </div>

    </div>
@endsection

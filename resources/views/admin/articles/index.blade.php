@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Artikel</h1>
                    <div>
                        <a href="{{ route('articles.create') }}" class="btn btn-primary">Tambah Artikel</a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Articles</li>
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
                            {{-- <th>Kategori</th> --}}
                            <th>Title</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td scope="row">{{ $loop->index + 1 * request('page', 1) * 10 - 10 + 1 }}</td>

                                {{-- <td>{{ $article->category->name }}</td> --}}
                                <td>{{ $article->title }}</td>
                                <td>{{ strlen($article->description) > 50 ? substr($article->description, 0, 50) . '....' : $article->description }}
                                </td>
                                <td>
                                    <a href="{{ route('articles.show', $article->id) }}"
                                        class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('articles.edit', $article->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <a onclick="confirm('yakin akan menghapus data??') ?  document.getElementById('delete-user-{{ $article->id }}').submit() : null
                                        "
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <form method="POST" action="{{ route('articles.destroy', $article->id) }}"
                                id="delete-user-{{ $article->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endforeach
                    </tbody>
                </table>
                {{ $articles->links() }}

            </div>


        </div>

    </div>
@endsection

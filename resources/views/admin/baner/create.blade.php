@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Tambah baner</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('teacher.index') }}">Baner</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <form action="{{ route('teacher.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Nama</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                    placeholder="Ketikkan Nama" aria-describedby="helpId">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" id="link"
                                    class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}"
                                    placeholder="Ketikkan Link" aria-describedby="helpId">
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Foto</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" />
                                <span class="invalid-feedback" role="alert">
                                    @error('image')
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>

            </div>


        </div>

    </div>
@endsection
